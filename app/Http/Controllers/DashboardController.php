<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDataPPDB;
use App\Models\ModelDataSiswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            return view('dashboard.index', [
                'title' => 'Dashboard Admin'
            ]);
        } else {
            $siswa = ModelDataSiswa::where('nisn', auth()->user()->nisn)->first();
            $ppdb = ModelDataPPDB::where('id_data_siswa', $siswa->id_data_siswa)->first();
            if ($ppdb && $ppdb->status == 1) {
                return view('success', [
                    'title' => 'Dashboard Admin'
                ]);
            } else {
                return view('dashboard.index', [
                    'title' => 'Dashboard Admin'
                ]);
            }
        }
    }

    public function sendMessage(Request $request)
    {
        $phoneNumber = $request->no_telp;
        $message = 'Selamat '.$request->nama.', kamu berhasil lolos pendaftaran peserta didik baru SMP Negeri 29 Kerinci.';

        $encodedMessage = urlencode($message);

        $whatsappUrl = "https://wa.me/$phoneNumber?text=$encodedMessage";
        dd($whatsappUrl);

        return redirect()->to($whatsappUrl);
    }
}
