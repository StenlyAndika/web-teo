<?php

namespace App\Http\Controllers;

use App\Models\ModelJaksa;
use App\Models\ModelBeritaAcaraPelimpahan;
use Illuminate\Http\Request;
use App\Models\ModelTersangka;
use App\Models\ModelJaksaPenuntut;
use App\Models\ModelPenerimaanSPDP;
use App\Models\ModelInstansiPenyidik;
use App\Models\ModelInstansiPelaksana;

class BeritaAcaraPelimpahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.beritaacara.index', [
            'title' => 'Berkas Berita Acara Pelimpahan',
            'beritaacara' => ModelBeritaAcaraPelimpahan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.beritaacara.add', [
            'title' => 'Berkas Berita Acara Pelimpahan',
            'penerimaanspdp' => ModelPenerimaanSPDP::all()
        ]);
    }

    public function data_spdp($index)
    {
        $dataspdp = ModelPenerimaanSPDP::where('id_penerimaan_spdp', $index)->first();
        return view('dashboard.beritaacara.dataspdp', [
            'dataspdp' => $dataspdp,
            'penyidik' => ModelInstansiPenyidik::where('id_instansi_penyidik', $dataspdp->id_instansi_penyidik)->first(),
            'tersangka' => ModelTersangka::where('id_penerimaan_spdp', $dataspdp->id_penerimaan_spdp)->first()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_penerimaan_spdp' => 'required',
            'no_p31' => 'required',
            'jenis_tahanan' => 'required',
            'tgl_penahanan_dari' => 'required',
            'tgl_penahanan_hingga' => 'required',
            'lokasi_penahanan' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_penahanan_dari'] = date('Y-m-d', strtotime($validatedData['tgl_penahanan_dari']));
        $validatedData['tgl_penahanan_hingga'] = date('Y-m-d', strtotime($validatedData['tgl_penahanan_hingga']));

        ModelBeritaAcaraPelimpahan::create($validatedData);

        return redirect()->route('admin.beritaacara.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelBeritaAcaraPelimpahan::where('id_penerimaan_spdp', $id)->delete();
        return redirect()->route('admin.beritaacara.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
