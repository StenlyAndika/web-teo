<?php

namespace App\Http\Controllers;

use App\Models\ModelJaksa;
use App\Models\ModelDataIbu;
use Illuminate\Http\Request;
use App\Models\ModelDataAyah;
use App\Models\ModelDataPPDB;
use App\Models\ModelDataSiswa;

class PPDBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = [
            'PNS',
            'TNI',
            'POLRI',
            'Pegawai Swasta',
            'Wiraswasta',
            'Petani',
            'Nelayan',
            'Buruh',
            'Lainnya'
        ];

        $pendidikan = [
            'SD',
            'SMP',
            'SMA',
            'D3',
            'S1',
            'S2',
            'S3'
        ];

        return view('ppdb', [
            'title' => 'Data Penerimaan Peserta Didik Baru',
            'pekerjaan' => $pekerjaan,
            'pendidikan' => $pendidikan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rulesSiswa = [
                'nisn' => 'required',
                'nik' => 'required',
                'nama' => 'required',
                'panggilan' => 'required',
                'tempat_lahir' => 'required',
                'tgl_lahir' => 'required',
                'jekel' => 'required',
                'alamat' => 'required',
                'asal_sekolah' => 'required',
                'no_telp' => 'required',
            ];

            $validatedDataSiswa = $request->validate($rulesSiswa);
            $validatedDataSiswa['tgl_lahir'] = date('Y-m-d', strtotime($validatedDataSiswa['tgl_lahir']));

            $new_record_siswa = ModelDataSiswa::create($validatedDataSiswa);

            $rulesAyah = [
                'nik_ayah' => 'required',
                'nama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'no_telp_ayah' => 'required',
            ];

            $validatedDataAyah = $request->validate($rulesAyah);
            $validatedDataAyah['id_data_siswa'] = $new_record_siswa->id;
            $validatedDataAyah['nik'] = $validatedDataAyah['nik_ayah'];
            $validatedDataAyah['nama'] = $validatedDataAyah['nama_ayah'];
            $validatedDataAyah['pekerjaan'] = $validatedDataAyah['pekerjaan_ayah'];
            $validatedDataAyah['pendidikan'] = $validatedDataAyah['pendidikan_ayah'];
            $validatedDataAyah['no_telp'] = $validatedDataAyah['no_telp_ayah'];

            $new_record_ayah = ModelDataAyah::create($validatedDataAyah);

            $rulesIbu = [
                'nik_ibu' => 'required',
                'nama_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'pendidikan_ibu' => 'required',
                'no_telp_ibu' => 'required',
            ];

            $validatedDataIbu = $request->validate($rulesIbu);
            $validatedDataIbu['id_data_siswa'] = $new_record_siswa->id;
            $validatedDataIbu['nik'] = $validatedDataIbu['nik_ibu'];
            $validatedDataIbu['nama'] = $validatedDataIbu['nama_ibu'];
            $validatedDataIbu['pekerjaan'] = $validatedDataIbu['pekerjaan_ibu'];
            $validatedDataIbu['pendidikan'] = $validatedDataIbu['pendidikan_ibu'];
            $validatedDataIbu['no_telp'] = $validatedDataIbu['no_telp_ibu'];

            $new_record_ibu = ModelDataIbu::create($validatedDataIbu);

            $rulesPpdb = [
                'upload_kk' => 'file|mimes:pdf',
                'upload_akta' => 'file|mimes:pdf',
                'upload_ijazah' => 'file|mimes:pdf',
            ];

            $validatedDataPPDB = $request->validate($rulesPpdb);

            if ($request->file('upload_kk')) {
                $validatedDataPPDB['upload_kk'] = $request->file('upload_kk')->store('upload/upload_kk');
            }

            if ($request->file('upload_akta')) {
                $validatedDataPPDB['upload_akta'] = $request->file('upload_akta')->store('upload/upload_akta');
            }

            if ($request->file('upload_ijazah')) {
                $validatedDataPPDB['upload_ijazah'] = $request->file('upload_ijazah')->store('upload/upload_ijazah');
            }

            $validatedDataPPDB['id_data_siswa'] = $new_record_siswa->id;
            $validatedDataPPDB['id_data_ayah'] = $new_record_ayah->id;
            $validatedDataPPDB['id_data_ibu'] = $new_record_ibu->id;
            $validatedDataPPDB['status'] = 'Menunggu Verifikasi';

            ModelDataPPDB::create($validatedDataPPDB);

        return redirect()->route('success')->with('nama_success', $request->nama);
        } catch (\Exception $e) {
            return redirect()->back()->with(['toast_error' => $e->getMessage()]);
        }

        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil ditambah!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nip' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'notelp' => 'required'
        ];

        $validatedData = $request->validate($rules);

        ModelJaksa::where('id_jaksa', $id)->update($validatedData);

        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelJaksa::where('id_jaksa', $id)->delete();
        return redirect()->route('admin.jaksa.index')->with('toast_success', 'Data berhasil dihapus!');
    }
}
