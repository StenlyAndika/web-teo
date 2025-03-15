<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelDataPPDB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Admin'
        ]);
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
