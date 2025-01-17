<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ModelHakim;
use App\Models\ModelPerkara;
use Illuminate\Http\Request;
use App\Models\ModelKategori;
use Barryvdh\DomPDF\Facade\PDF;

class PerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.perkara.index', [
            'title' => 'Data Perkara',
            'perkara' => ModelPerkara::all(),
            'kategori' => ModelKategori::all(),
            'hakim' => ModelHakim::all()
        ]);
    }

    public function laporan(Request $request)
    {
        $bln = $request->input('bln') ?? '0';
        return view('dashboard.perkara.laporan', [
            'title' => 'Data Laporan Perkara',
            'perkara' => ModelPerkara::whereMonth('tgl_pendaftaran', '=', date('m', strtotime($bln)))
            ->whereYear('tgl_pendaftaran', '=', date('Y', strtotime($bln)))
            ->get(),
            'kategori' => ModelKategori::all(),
            'hakim' => ModelHakim::all(),
            'bln' => $bln
        ]);
    }

    public function print($bln) {

        $perkara = ModelPerkara::whereMonth('tgl_pendaftaran', '=', date('m', strtotime($bln)))
        ->whereYear('tgl_pendaftaran', '=', date('Y', strtotime($bln)))
        ->get();

        $pdf = PDF::loadView('dashboard.perkara.print', ['perkara' => $perkara, 'bln' => $bln]);
        $pdf->setPaper('A3', 'landscape');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Perkara-'. $a .'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'no_perkara' => 'required',
            'tgl_pendaftaran' => 'required|date',
            'id_kategori' => 'required',
            'status' => 'required',
            'id_hakim' => 'required',
            'tgl_putusan' => 'required|date'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_pendaftaran'] = date('Y-m-d', strtotime($validatedData['tgl_pendaftaran']));
        $validatedData['tgl_putusan'] = date('Y-m-d', strtotime($validatedData['tgl_putusan']));

        ModelPerkara::create($validatedData);

        return redirect()->route('admin.perkara.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'no_perkara' => 'required',
            'tgl_pendaftaran' => 'required|date',
            'id_kategori' => 'required',
            'status' => 'required',
            'id_hakim' => 'required',
            'tgl_putusan' => 'required|date'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_pendaftaran'] = date('Y-m-d', strtotime($validatedData['tgl_pendaftaran']));
        $validatedData['tgl_putusan'] = date('Y-m-d', strtotime($validatedData['tgl_putusan']));

        ModelPerkara::where('id_perkara', $id)->update($validatedData);

        return redirect()->route('admin.perkara.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelPerkara::where('id_perkara', $id)->delete();
        return redirect()->route('admin.perkara.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
