<?php

namespace App\Http\Controllers;

use App\Models\ModelJaksa;
use App\Models\ModelPenBT1;
use Illuminate\Http\Request;
use App\Models\ModelTersangka;
use App\Models\ModelJaksaPenuntut;
use App\Models\ModelPenerimaanSPDP;
use App\Models\ModelInstansiPenyidik;
use App\Models\ModelInstansiPelaksana;

class PenerimaanBerkasTIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->forget('temp_jaksa_data');
        return view('dashboard.penerimaanberkasperkara.index', [
            'title' => 'Penerimaan Berkas Perkara',
            'penerimaanberkastahap1' => ModelPenBT1::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.penerimaanberkasperkara.add', [
            'title' => 'Penerimaan Berkas Perkara',
            'penerimaanspdp' => ModelPenerimaanSPDP::all()
        ]);
    }

    public function data_spdp($index)
    {
        $dataspdp = ModelPenerimaanSPDP::where('id_penerimaan_spdp', $index)->first();
        return view('dashboard.penerimaanberkasperkara.dataspdp', [
            'dataspdp' => $dataspdp,
            'penyidik' => ModelInstansiPenyidik::where('id_instansi_penyidik', $dataspdp->id_instansi_penyidik)->first(),
            'tersangka' => ModelTersangka::where('id_penerimaan_spdp', $dataspdp->id_penerimaan_spdp)->first()
        ]);
    }

    public function data_jaksa(Request $request)
    {
        $search = $request->get('term');

        $jaksa = ModelJaksa::where('nama', 'LIKE', '%' . $search . '%')->get();

        $result = [];
        foreach ($jaksa as $row) {
            $result[] = ['value' => $row->nama, 'id' => $row->id_jaksa];
        }

        return response()->json($result);
    }

    public function get_temp_jaksa() {
        $tempJaksa = session('temp_jaksa_data', []);

        $jaksaItems = [];
        foreach ($tempJaksa as $id => $data) {
            $jaksa = ModelJaksa::where('id_jaksa', $id)->first();

            if ($jaksa) {
                $jaksaItems[] = [
                    'id_jaksa' => $jaksa->id_jaksa,
                    'nip' => $jaksa->nip,
                    'nama' => $jaksa->nama,
                    'pangkat' => $jaksa->pangkat
                ];
            }
        }

        return response()->json(['data' => $jaksaItems]);
    }

    public function set_temp_jaksa(Request $request) {
        $id = $request->input('id_jaksa');

        $jaksa = ModelJaksa::where('id_jaksa', $id)->first();

        $tempJaksa = session('temp_jaksa_data', []);

        $tempJaksa[$id] = [
            'id_jaksa' => $jaksa->id_jaksa,
            'nip' => $jaksa->nip,
            'nama' => $jaksa->nama,
            'pangkat' => $jaksa->pangkat
        ];

        session(['temp_jaksa_data' => $tempJaksa]);

        return response()->json(['success' => true]);
    }

    public function delete_temp_jaksa($id)
    {
        $tempJaksa = session('temp_jaksa_data', []);

        if (isset($tempJaksa[$id])) {
            unset($tempJaksa[$id]);
            session(['temp_jaksa_data' => $tempJaksa]);
        }


        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_penerimaan_spdp' => 'required',
            'no_p16' => 'required',
            'tgl_p16' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $validatedData['tgl_p16'] = date('Y-m-d', strtotime($validatedData['tgl_p16']));

        $newRecord = ModelPenBT1::create($validatedData);

        $tempJaksa = session('temp_jaksa_data');

        foreach ($tempJaksa as $id => $data) {
            $validatedDataJaksa = [
                'id_penerimaan_berkas_tahap_i' => $newRecord->id_penerimaan_berkas_tahap_i,
                'id_jaksa' => $data['id_jaksa']
            ];

            ModelJaksaPenuntut::create($validatedDataJaksa);
        }

        return redirect()->route('admin.penbt1.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $a = ModelPenBT1::where('id_penerimaan_spdp', $id)->first();
        ModelJaksaPenuntut::where('id_penerimaan_berkas_tahap_i', $a->id_penerimaan_berkas_tahap_i)->delete();
        ModelPenBT1::where('id_penerimaan_spdp', $id)->delete();
        return redirect()->route('admin.penbt1.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
