<?php

namespace App\Http\Controllers;

use App\Models\ModelJaksa;
use Illuminate\Http\Request;
use App\Models\ModelTersangka;
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
            'title' => 'Penerimaan Berkas Perkara Tahap I'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.penerimaanberkasperkara.add', [
            'title' => 'Penerimaan Berkas Perkara Tahap I',
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
        $validatedDataTersangka['jekel'] = $tempTersangka['jekel'];
        $validatedDataTersangka['tempat_lahir'] = $tempTersangka['tempat_lahir'];
        $validatedDataTersangka['tgl_lahir'] = $tempTersangka['tgl_lahir'];
        $validatedDataTersangka['agama'] = $tempTersangka['agama'];
        $validatedDataTersangka['pekerjaan'] = $tempTersangka['pekerjaan'];


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
