<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ModelPenBT1;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ModelBeritaAcaraPelimpahan;

class LaporanController extends Controller
{
    public function laporan_p31(Request $request)
    {
        $id = $request->input('id') ?? '0';
        $p31 = ModelBeritaAcaraPelimpahan::where('id_berita_acara_pelimpahan', $id)->first();

        // return view('dashboard.laporan.p31', [
        //     'title' => 'Data Laporan P-31',
        //     'p31' => ModelBeritaAcaraPelimpahan::where('id_berita_acara_pelimpahan', $id)->first()
        // ]);

        $pdf = PDF::loadView('dashboard.laporan.p31', ['p31' => $p31]);
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait'); //F4

        return $pdf->download('Laporan-P31-'. $p31->no_p31 .'.pdf');
    }

    public function laporan_p16(Request $request)
    {
        $id = $request->input('id') ?? '0';
        $p16 = ModelPenBT1::where('id_penerimaan_berkas_tahap_i', $id)->first();

        $pdf = PDF::loadView('dashboard.laporan.p16', ['p16' => $p16]);
        $pdf->setPaper(array(0,0,609.4488,935.433), 'portrait'); //F4

        return $pdf->download('Laporan-P16-'. $p16->no_p16 .'.pdf');
    }

    public function laporan_pelimpahan(Request $request)
    {
        $bln = $request->input('bln') ?? '0';
        return view('dashboard.laporan.pelimpahan', [
            'title' => 'Data Laporan Pelimpahan',
            'pelimpahan' => ModelPenBT1::whereMonth('tgl_p16', '=', date('m', strtotime($bln)))
            ->whereYear('tgl_p16', '=', date('Y', strtotime($bln)))
            ->whereIn('id_penerimaan_spdp', function ($query) {
                $query->select('id_penerimaan_spdp')
                    ->from('pelimpahan');
            })
            ->get(),
            'bln' => $bln
        ]);
    }

    public function laporan_pelimpahan_print($bln) {

        $pelimpahan = ModelPenBT1::whereMonth('tgl_p16', '=', date('m', strtotime($bln)))
        ->whereYear('tgl_p16', '=', date('Y', strtotime($bln)))
        ->whereIn('id_penerimaan_spdp', function ($query) {
            $query->select('id_penerimaan_spdp')
                ->from('pelimpahan');
        })
        ->get();

        $pdf = PDF::loadView('dashboard.laporan.print', ['pelimpahan' => $pelimpahan, 'bln' => $bln]);
        $pdf->setPaper('A3', 'landscape');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Pelimpahan-'. $a .'.pdf');
    }
}
