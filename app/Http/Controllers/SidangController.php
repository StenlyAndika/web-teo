<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\ModelSidang;
use App\Models\ModelPerkara;
use Illuminate\Http\Request;

class SidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.sidang.index', [
            'title' => 'Data Sidang',
            'sidang' => ModelSidang::all(),
            'perkara' => ModelPerkara::all()
        ]);
    }

    public function laporan(Request $request)
    {
        $bln = $request->input('bln') ?? '0';
        return view('dashboard.sidang.laporan', [
            'title' => 'Data Laporan Sidang',
            'sidang' => ModelSidang::whereMonth('tgl_sidang', '=', date('m', strtotime($bln)))
            ->whereYear('tgl_sidang', '=', date('Y', strtotime($bln)))
            ->get(),
            'perkara' => ModelPerkara::all(),
            'bln' => $bln
        ]);
    }

    public function print($bln) {

        $sidang = ModelSidang::whereMonth('tgl_sidang', '=', date('m', strtotime($bln)))
        ->whereYear('tgl_sidang', '=', date('Y', strtotime($bln)))
        ->get();

        $pdf = PDF::loadView('dashboard.sidang.print', ['sidang' => $sidang, 'bln' => $bln]);
        $pdf->setPaper('A3', 'landscape');
        $a = Carbon::parse($bln)->format('m-Y');

        return $pdf->download('Laporan-Sidang-'. $a .'.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_perkara' => 'required',
            'tgl_sidang' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'ruang_sidang' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_sidang'] = Carbon::parse($validatedData['tgl_sidang'])->format('Y-m-d');

        ModelSidang::create($validatedData);

        return redirect()->route('admin.sidang.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'id_perkara' => 'required',
            'tgl_sidang' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'ruang_sidang' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_sidang'] = Carbon::parse($validatedData['tgl_sidang'])->format('Y-m-d');

        ModelSidang::where('id_sidang', $id)->update($validatedData);

        return redirect()->route('admin.sidang.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelSidang::where('id_sidang', $id)->delete();
        return redirect()->route('admin.sidang.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
