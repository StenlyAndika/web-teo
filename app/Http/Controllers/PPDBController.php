<?php

namespace App\Http\Controllers;

use App\Models\ModelJaksa;
use App\Models\ModelDataIbu;
use Illuminate\Http\Request;
use App\Models\ModelDataAyah;
use App\Models\ModelDataPPDB;
use App\Models\ModelDataSiswa;
use Illuminate\Support\Facades\Http;

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

        return view('dashboard.ppdb.ppdb', [
            'title' => 'Data Penerimaan Peserta Didik Baru',
            'pekerjaan' => $pekerjaan,
            'siswa' => ModelDataSiswa::where('nisn', auth()->user()->nisn)->first(),
            'pendidikan' => $pendidikan
        ]);
    }

    public function ppdbData() {
        return view('dashboard.ppdb.index', [
            'title' => 'Data Pendaftar PPDB SMP Negeri 29 Kerinci Tahun Ajaran 2025/2026',
            'ppdb' => ModelDataPPDB::all()
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

            ModelDataSiswa::where('id_data_siswa', $request->id_data_siswa)->update($validatedDataSiswa);
            // $new_record_siswa = ModelDataSiswa::create($validatedDataSiswa);

            $rulesAyah = [
                'nik_ayah' => 'required',
                'nama_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'no_telp_ayah' => 'required',
            ];

            $validatedDataAyah = $request->validate($rulesAyah);
            $validatedDataAyah['id_data_siswa'] = $request->id_data_siswa;
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
            $validatedDataIbu['id_data_siswa'] = $request->id_data_siswa;
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
                $validatedDataPPDB['upload_kk'] = $request->file('upload_kk')->store('public/upload/upload_kk');
            }

            if ($request->file('upload_akta')) {
                $validatedDataPPDB['upload_akta'] = $request->file('upload_akta')->store('public/upload/upload_akta');
            }

            if ($request->file('upload_ijazah')) {
                $validatedDataPPDB['upload_ijazah'] = $request->file('upload_ijazah')->store('public/upload/upload_ijazah');
            }

            $validatedDataPPDB['id_data_siswa'] = $request->id_data_siswa;
            $validatedDataPPDB['id_data_ayah'] = $new_record_ayah->id;
            $validatedDataPPDB['id_data_ibu'] = $new_record_ibu->id;
            $validatedDataPPDB['status'] = 0;

            ModelDataPPDB::create($validatedDataPPDB);

        return redirect()->route('success')->with('nama_success', $request->nama);
        } catch (\Exception $e) {
            return redirect()->back()->with(['toast_error' => $e->getMessage()]);
        }
    }

    public function ppdbDetail($id) {
        return view('dashboard.ppdb.detail', [
            'title' => 'Detail Data Pendaftar PPDB SMP Negeri 29 Kerinci Tahun Ajaran 2025/2026',
            'ppdb' => ModelDataPPDB::where('id_data_ppdb', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function ppdbUpdateL($id)
    {
        $validatedDataPPDB['status'] = 1;

        ModelDataPPDB::where('id_data_ppdb', $id)->update($validatedDataPPDB);

        $tempPpdb = ModelDataPPDB::where('id_data_ppdb', $id)->first();
        $siswa = ModelDataSiswa::where('id_data_siswa', $tempPpdb->id_data_siswa)->first();

        $phone = '+62' . substr($siswa->no_telp, 1);
        $message = 'Selamat ' . $siswa->nama . ', kamu lolos pendaftaran peserta didik baru pada SMP Negeri 29 Kerinci.';

        $response = Http::post('http://127.0.0.1:3000/api/send', [
            'phone' => $phone,
            'message' => $message
        ]);

        return redirect()->route('admin.ppdb.index')->with('toast_success', 'Kelulusan berhasil dikonfirmasi!');
    }

    public function ppdbUpdateG($id)
    {
        $validatedDataPPDB['status'] = 2;

        ModelDataPPDB::where('id_data_ppdb', $id)->update($validatedDataPPDB);

        $tempPpdb = ModelDataPPDB::where('id_data_ppdb', $id)->first();
        $siswa = ModelDataSiswa::where('id_data_siswa', $tempPpdb->id_data_siswa)->first();

        $phone = '+62' . substr($siswa->no_telp, 1);
        $message = 'Mohon maaf ' . $siswa->nama . ', kamu belum lolos pendaftaran peserta didik baru pada SMP Negeri 29 Kerinci.';

        $response = Http::post('http://127.0.0.1:3000/api/send', [
            'phone' => $phone,
            'message' => $message
        ]);

        return redirect()->route('admin.ppdb.index')->with('toast_success', 'Kelulusan berhasil dikonfirmasi!');
    }

}
