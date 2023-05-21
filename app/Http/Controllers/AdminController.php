<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DetailTransaksi;
use App\Models\Obat;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminUsername = session()->get('admin_username');

        if ($adminUsername) {
            return view('pages.dashboard');
        }
        return view('auth.login');
    }

    public function dashboard()
    {
        $adminUsername = session()->get('admin_username');
        if (!$adminUsername) {
            return redirect('login');
        }
        $penjualan = array();
        $dataPenjualan = DB::table('transaksi')->select(DB::raw('MONTH(tgl) as bulan'))->orderBy('bulan', 'asc')->get();
        foreach ($dataPenjualan as $data) {
            $bulan = date("M", mktime(0, 0, 0, $data->bulan, 1));
            $jumlah = DB::table('transaksi')->where(DB::raw('MONTH(tgl)'), '=', $data->bulan)->count();
            $penjualan[$bulan] = $jumlah;
        }
        $total_obat = Obat::count();
        $tgl = date('Y-m-d');
        $total_penjualan = Transaksi::whereDate('created_at', $tgl)->count();
        $status_obat = Obat::where('stok', 0)->get();
        $obat_kadaluarsa = Obat::where('tgl_kadaluarsa', '<', Carbon::now())->get();

        return view('pages.dashboard', compact('penjualan', 'total_obat', 'total_penjualan', 'status_obat', 'obat_kadaluarsa'));
    }

    public function login(Request $request)
    {
        $adminUsername = session()->get('admin_username');
        if (!$adminUsername) {
            return redirect('login');
        }

        $admin = Admin::where('username', $request->username)->where('password', $request->password)->first();
        if ($admin) {
            session()->put('admin_username', $admin->username);
            session()->put('admin_id', $admin->id);
            return redirect('dashboard');
        }

        return back()->withErrors([
            'message' => 'Username atau password salah',
        ]);
    }

    public function logout()
    {
        session()->forget('admin_username');
        session()->forget('admin_id');
        return redirect('/login');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:admin',
            'password' => 'required|min:8',
        ]);

        $admin = new Admin;
        $admin->nama = $validatedData['nama'];
        $admin->username = $validatedData['username'];
        $admin->password = bcrypt($validatedData['password']);
        $admin->save();

        return redirect()->route('admin.create')->with('success', 'Admin berhasil ditambahkan');
    }

    public function laporan()
    {
        $adminUsername = session()->get('admin_username');

        if (!$adminUsername)
            return view('auth.login');

        $bulan = date('m');
        $tahun = date('Y');
        $obat = DetailTransaksi::selectRaw('nama_obat,harga, SUM(jumlah) as total_obat,SUM(jumlah * harga) AS sub_total')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->groupBy('nama_obat', 'harga')
            ->get();
        $total_transaksi = 0;
        foreach ($obat as $value) {
            $total_transaksi += $value['sub_total'];
        }
        return view('pages.laporan',compact('obat','total_transaksi'));
    }
}
