<?php

namespace App\Http\Controllers;

use App\Models\ModelPenBT1;
use Illuminate\Http\Request;
use App\Models\ModelTersangka;
use App\Models\ModelPelimpahan;
use App\Models\ModelInstansiPenyidik;
use App\Models\ModelInstansiPelaksana;
use App\Models\ModelWilayahPelimpahan;

class PelimpahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pelimpahan.index', [
            'title' => 'Penyelesaian Tahap Pra Penuntutan',
            'penerimaanberkastahap1' => ModelPenBT1::orderBy('id_penerimaan_spdp', 'desc')->get(),
            'wilayahpelimpahan' => ModelWilayahPelimpahan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_penerimaan_spdp' => 'required',
            'tgl_pelimpahan' => 'required',
            'id_wilayah_pelimpahan' => 'required',
            'berkas_p16' => 'file|mimes:pdf',
            'berkas_sprint' => 'file|mimes:pdf',
            'berkas_spptbb' => 'file|mimes:pdf'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_pelimpahan'] = date('Y-m-d', strtotime($validatedData['tgl_pelimpahan']));

        if ($request->file('berkas_p16')) {
            $validatedData['berkas_p16'] = $request->file('berkas_p16')->store('upload/berkas_p16');
        }
        if ($request->file('berkas_sprint')) {
            $validatedData['berkas_sprint'] = $request->file('berkas_sprint')->store('upload/berkas_sprint');
        }
        if ($request->file('berkas_spptbb')) {
            $validatedData['berkas_spptbb'] = $request->file('berkas_spptbb')->store('upload/berkas_spptbb');
        }

        ModelPelimpahan::create($validatedData);

        return redirect()->route('admin.pelimpahan.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelPelimpahan::where('id_penerimaan_spdp', $id)->delete();
        return redirect()->route('admin.pelimpahan.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
