<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTersangka;
use App\Models\ModelPenerimaanSPDP;
use App\Models\ModelInstansiPenyidik;
use App\Models\ModelInstansiPelaksana;

class PenerimaanSPDPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('temp_tersangka');
        return view('dashboard.penerimaanspdp.index', [
            'title' => 'Pemberitahuan Dimulainya Penyidikan',
            'penerimaanspdp' => ModelPenerimaanSPDP::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenispidana = [
            'Pidana Umum',
            'Pidana Khusus',
            'Pidana Militer'
        ];

        $jenisperkara = [
            'Tindak Pidana Korupsi',
            'Tindak Pidana Narkotika',
            'Tindak Pidana Pencucian Uang'
        ];

        return view('dashboard.penerimaanspdp.add', [
            'title' => 'Tambah SPDP',
            'subtitle' => 'Pemberitahuan Dimulainya Penyidikan',
            'instansipenyidik' => ModelInstansiPenyidik::all(),
            'instansipelaksana' => ModelInstansiPelaksana::all(),
            'jenispidana' => $jenispidana,
            'jenisperkara' => $jenisperkara
        ]);
    }

    public function temptersangkastore(Request $request) {

        $tempTersangka = session('temp_tersangka', []);

        $newData = $request->all();
        $tempTersangka = array_merge($tempTersangka, array_filter($newData));

        session(['temp_tersangka' => $tempTersangka]);

        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_instansi_penyidik' => 'required',
            'id_instansi_pelaksana' => 'required',
            'no_sprindik' => 'required',
            'tgl_sprindik' => 'required',
            'no_spdp' => 'required',
            'tgl_spdp' => 'required',
            'diterima_wilayah_kerja' => 'required',
            'tgl_diterima' => 'required',
            'waktu_kejadian' => 'required',
            'tgl_kejadian' => 'required',
            'tempat_kejadian_perkara' => 'required',
            'uraian_singkat_perkara' => 'required',
            'undang_undang_dan_pasal' => 'required',
            'jenis_pidana' => 'required',
            'jenis_perkara' => 'required',
            'berkas_spdp' => 'file|mimes:pdf'
        ];

        // try {
        //     $validatedData = $request->validate($rules);
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     \Log::error('Validation failed: ', $e->errors());
        // }

        $validatedData = $request->validate($rules);

        $validatedData['tgl_sprindik'] = date('Y-m-d', strtotime($validatedData['tgl_sprindik']));
        $validatedData['tgl_spdp'] = date('Y-m-d', strtotime($validatedData['tgl_spdp']));
        $validatedData['tgl_diterima'] = date('Y-m-d', strtotime($validatedData['tgl_diterima']));
        $validatedData['tgl_kejadian'] = date('Y-m-d', strtotime($validatedData['tgl_kejadian']));

        // $filePath = $request->file('berkas_spdp')->store('upload/berkas_spdp');
        // \Log::info('File stored at: ' . $filePath);

        if ($request->file('berkas_spdp')) {
            $validatedData['berkas_spdp'] = $request->file('berkas_spdp')->store('upload/berkas_spdp');
        }

        $newRecord = ModelPenerimaanSPDP::create($validatedData);

        $tempTersangka = session('temp_tersangka');
        $validatedDataTersangka['id_penerimaan_spdp'] = $newRecord->id_penerimaan_spdp;
        $validatedDataTersangka['nama'] = $tempTersangka['nama'];
        $validatedDataTersangka['alamat'] = $tempTersangka['alamat'];
        $validatedDataTersangka['tempat_lahir'] = $tempTersangka['tempat_lahir'];
        $validatedDataTersangka['tgl_lahir'] = $tempTersangka['tgl_lahir'];


        ModelTersangka::create($validatedDataTersangka);

        return redirect()->route('admin.penerimaanspdp.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelPenerimaanSPDP::where('id_penerimaan_spdp', $id)->delete();
        ModelTersangka::where('id_penerimaan_spdp', $id)->delete();
        return redirect()->route('admin.penerimaanspdp.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
