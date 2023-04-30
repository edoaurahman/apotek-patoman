<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function viewPDF()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $obat = DetailTransaksi::selectRaw('nama_obat,harga, SUM(jumlah) as total_obat,SUM(jumlah * harga) AS sub_total')
            ->whereMonth('created_at', $bulan)
            ->whereYear('created_at', $tahun)
            ->groupBy('nama_obat', 'harga')
            ->get();
        $tanggal = date('F Y', strtotime($tahun . '-' . $bulan . '-01'));
        $total_transaksi = 0;
        foreach ($obat as $value) {
            $total_transaksi += $value['sub_total'];
        }

        $data = [
            'obat' => $obat,
            'tanggal' => $tanggal,
            'total_transaksi' => $total_transaksi
        ];

        $pdf = PDF::loadView('pages.components.pdf.laporan', array('data' => $data));
        return $pdf->stream();
    }
}
