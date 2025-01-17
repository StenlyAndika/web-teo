<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ModelJaksa;
use App\Models\ModelPerkara;
use Illuminate\Http\Request;
use App\Models\ModelCatatanPerkara;

class CatatanPerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.catatan.index', [
            'title' => 'Data Catatan Perkara',
            'catatan' => ModelCatatanPerkara::all(),
            'perkara' => ModelPerkara::all(),
            'jaksa' => ModelJaksa::all()
        ]);
    }

    public function laporan(Request $request)
    {
        $bln = $request->input('bln') ?? '0';
        return view('dashboard.catatan.laporan', [
            'title' => 'Data Laporan Catatan Perkara',
            'perkara' => ModelCatatanPerkara::whereMonth('tgl_catatan', '=', date('m', strtotime($bln)))
            ->whereYear('tgl_catatan', '=', date('Y', strtotime($bln)))
            ->get(),
            'bln' => $bln
        ]);
    }

    public function print($bln) {

        $catatan = ModelCatatanPerkara::whereMonth('tgl_catatan', '=', date('m', strtotime($bln)))
        ->whereYear('tgl_catatan', '=', date('Y', strtotime($bln)))
        ->get();

        $pdf = PDF::loadView('dashboard.catatan.print', ['catatan' => $catatan, 'bln' => $bln]);
        $pdf->setPaper('A3', 'landscape');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Catatan-Perkara-'. $a .'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_perkara' => 'required',
            'id_jaksa' => 'required',
            'tgl_catatan' => 'required|date',
            'isi_catatan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_catatan'] = Carbon::parse($validatedData['tgl_catatan'])->format('Y-m-d');

        ModelCatatanPerkara::create($validatedData);

        return redirect()->route('admin.catatan.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'id_perkara' => 'required',
            'id_jaksa' => 'required',
            'tgl_catatan' => 'required|date',
            'isi_catatan' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_catatan'] = Carbon::parse($validatedData['tgl_catatan'])->format('Y-m-d');

        ModelCatatanPerkara::where('id_catatan', $id)->update($validatedData);

        return redirect()->route('admin.catatan.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelCatatanPerkara::where('id_catatan', $id)->delete();
        return redirect()->route('admin.catatan.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
