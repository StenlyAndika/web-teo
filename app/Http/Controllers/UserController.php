<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.siswa.index', [
            'title' => 'Data Akun Siswa',
            'user' => User::where('is_admin', 0)->get(),
        ]);
    }

    public function userUpdateV($nisn)
    {
        $validatedDataUser['is_siswa'] = 1;

        User::where('nisn', $nisn)->update($validatedDataUser);

        $siswa = ModelDataSiswa::where('nisn', $nisn)->first();

        $phone = '+62' . substr($siswa->no_telp, 1);
        $message = 'Selamat ' . $siswa->nama . ', akunmu telah diverifikasi, silakan lanjutkan pendaftaran peserta didik baru pada SMP Negeri 29 Kerinci.';

        $response = Http::post('http://127.0.0.1:3000/api/send', [
            'phone' => $phone,
            'message' => $message
        ]);

        return redirect()->route('admin.user.index')->with('toast_success', 'Akun diverifikasi!');
    }

    public function userUpdateT($nisn)
    {
        $validatedDataUser['is_siswa'] = 2;

        User::where('nisn', $nisn)->update($validatedDataUser);

        return redirect()->route('admin.user.index')->with('toast_success', 'Akun tidak diverifikasi!');
    }
}
