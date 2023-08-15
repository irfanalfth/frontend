<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $res = DB::select("SELECT kodebr, DATE_FORMAT(time_created, '%Y-%m') AS bulan, AVG(harga) AS rata_rata_harga, AVG(jml) AS rata_rata_jumlah, AVG(subtotal) AS rata_rata_subtotal FROM detail_npb WHERE time_created >= DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 50 MONTH) GROUP BY kodebr, DATE_FORMAT(time_created, '%Y-%m') ORDER BY kodebr, bulan DESC;");

        $data = [
            'title' => 'Laporan',
            'detail_bpb' => $res
        ];

        return view('laporan.laporan', $data);
    }

    public function generatePDF1($kodebr)
    {
        $res = DB::select("SELECT kodebr, DATE_FORMAT(time_created, '%Y-%m') AS bulan, AVG(harga) AS rata_rata_harga, AVG(jml) AS rata_rata_jumlah, AVG(subtotal) AS rata_rata_subtotal FROM detail_npb WHERE time_created >= DATE_SUB(CURRENT_TIMESTAMP, INTERVAL 50 MONTH) AND kodebr = $kodebr GROUP BY kodebr, DATE_FORMAT(time_created, '%Y-%m') ORDER BY kodebr, bulan DESC;");

        $data = [
            'title' => 'Laporan',
            'detail_bpb' => $res
        ];

        $pdf = PDF::loadView('laporan.laporan', $data);

        return $pdf->download('laporan.pdf');
    }
}
