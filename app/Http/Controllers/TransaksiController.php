<?php

namespace App\Http\Controllers;

use App\Models\DetailKeranjang;
use App\Models\DetailTransaksi;
use App\Models\Keranjang;
use App\Models\Obat;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');


        $transaksi = Transaksi::all();
        $keranjang = Keranjang::all();
        return view('pages.transaksi', compact('transaksi', 'keranjang'));
    }

    public function pilihObat($id)
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $obats = Obat::all();
        $keranjang_id = $id;
        $detail_keranjang = DetailKeranjang::where('keranjang_id', $keranjang_id)->get();

        foreach ($detail_keranjang as $detail) {
            $obat = $obats->where('kode', $detail->kode_obat)->first();
            $obat->stok -= $detail->jumlah;
        }
        $detail_keranjang = DetailKeranjang::where('keranjang_id', $id)->with('obat')->get();
        $keranjang = Keranjang::find($keranjang_id);
        $total_pembayaran = $keranjang->total_pembayaran ?? 0;
        return view('pages.components.transaksi.pilihObat', compact('obats', 'keranjang_id', 'detail_keranjang', 'total_pembayaran'));
    }


    public function tambahObat(Request $request)
    {
        $adminUsername = session()->get('admin_username');
        if (!$adminUsername) {
            return view('auth.login');
        }

        if ($request->jumlah_obat == 0) {
            return redirect()->back();
        }

        $keranjang = Keranjang::find($request->keranjang_id);
        $total = $keranjang->total_pembayaran ?? 0;
        $obat = Obat::find($request->kode_obat);

        $detail_keranjang = DetailKeranjang::where('keranjang_id', $request->keranjang_id)
            ->where('kode_obat', $request->kode_obat)
            ->first();

        if (!$detail_keranjang) {
            $detail_keranjang = new DetailKeranjang();
            $detail_keranjang->keranjang_id = $request->keranjang_id;
            $detail_keranjang->kode_obat = $request->kode_obat;
            $detail_keranjang->jumlah = 0;
        }

        $detail_keranjang->jumlah += $request->jumlah_obat;
        $total += $request->jumlah_obat * $obat->harga;

        $keranjang->total_pembayaran = $total;
        $keranjang->save();

        $detail_keranjang->save();

        return redirect()->back();
    }


    public function hapusObat(Request $request)
    {
        $detail_keranjang = DetailKeranjang::where('keranjang_id', $request->keranjang_id)->where('kode_obat', $request->kode_obat)->with('obat')->first();

        $keranjang = Keranjang::where('id', $request->keranjang_id)->first();
        $keranjang->total_pembayaran -= $detail_keranjang['obat']->harga * $request->jumlah_obat;
        $detail_keranjang->delete();
        $keranjang->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $adminUsername = session()->get('admin_username');
        $adminId = session()->get('admin_id');

        if (!$adminUsername)
            return view('pages.dashboard');

        $keranjang = new Keranjang();
        $keranjang->admin_id = $adminId;
        $keranjang->tgl = date('Y-m-d H:i:s');
        $keranjang->save();
        return redirect('transaksi/pilih-obat/' . $keranjang->id);
    }

    public function bayar(Request $request)
    {
        $keranjang = Keranjang::find($request->keranjang_id);

        $transaksi = new Transaksi();
        $transaksi->tgl = $request->tgl;
        $transaksi->admin_id = $keranjang->admin_id;
        $transaksi->total_pembayaran = $keranjang->total_pembayaran;
        $transaksi->jumlah_bayar = $request->jumlah_bayar;
        $transaksi->save();

        $detail_keranjang = DetailKeranjang::where('keranjang_id', $request->keranjang_id)->with('obat')->get();
        foreach ($detail_keranjang as $detail) {
            $detail_transaksi = new DetailTransaksi();
            $detail_transaksi->transaksi_id = $transaksi->id;
            $detail_transaksi->kode_obat = $detail->kode_obat;
            $detail_transaksi->nama_obat = $detail['obat']->nama_obat;
            $detail_transaksi->harga = $detail['obat']->harga;
            $detail_transaksi->jumlah = $detail->jumlah;
            $detail_transaksi->save();
        }

        DetailKeranjang::where('keranjang_id', $request->keranjang_id)->delete();
        Keranjang::find($request->keranjang_id)->delete();

        return redirect('transaksi/faktur/' . $transaksi->id);
    }
    public function batal($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return redirect()->back();
    }

    public function detail($id)
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');
        $detail_transaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        return view('pages.components.transaksi.detail', compact('detail_transaksi'));
    }

    public function faktur($id)
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $transaksi = Transaksi::find($id);
        $detail_transaksi = DetailTransaksi::where('transaksi_id', $id)->get();
        return view('pages.components.transaksi.faktur', compact('transaksi', 'detail_transaksi'));
    }
}
