<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ModelDataPPDB;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ModelBeritaAcaraPelimpahan;

class LaporanController extends Controller
{
    public function laporan_ppdb(Request $request)
    {
        $bln = $request->input('bln') ?? '0';
        return view('dashboard.laporan.ppdb', [
            'title' => 'Data Laporan PPDB',
            'ppdb' => ModelDataPPDB::whereMonth('created_at', '=', date('m', strtotime($bln)))
            ->whereYear('created_at', '=', date('Y', strtotime($bln)))
            ->get(),
            'bln' => $bln
        ]);
    }

    public function laporan_ppdb_print($bln) {

        $ppdb = ModelDataPPDB::whereMonth('created_at', '=', date('m', strtotime($bln)))
        ->whereYear('created_at', '=', date('Y', strtotime($bln)))
        ->get();

        $pdf = PDF::loadView('dashboard.laporan.print', ['ppdb' => $ppdb, 'bln' => $bln]);
        $pdf->setPaper('A4', 'portrait');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-PPDB-'. $a .'.pdf');
    }
}
