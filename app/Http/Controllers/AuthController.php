<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('index', [
            'title' => 'Penerimaan Peserta Didik Baru SMP N Kerinci'
        ]);
    }

    public function login() {
        return view('auth.login', [
            'title' => 'Penerimaan Peserta Didik Baru SMP N Kerinci'
        ]);
    }

    public function success() {
        return view('success', [
            'title' => 'Penerimaan Peserta Didik Baru SMP N Kerinci'
        ]);
    }

    public function generate()
    {
        $validated['username'] = 'admin';
        $validated['password'] = bcrypt('admin');
        $validated['nama'] = 'Admin';
        $validated['is_admin'] = '1';
        $validated['is_root'] = '0';

        User::create($validated);

        return redirect()->route('welcome')->with('toast_success', 'Admin berhasil ditambah!');
    }

    public function authenticate(Request $request) {
        if($request->username == null) {
            return back()->with('toast_error', 'Username tidak boleh kosong!');
        }

        if($request->password == null) {
            return back()->with('toast_error', 'Password tidak boleh kosong!');
        }

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard')->with('toast_success', 'Login Berhasil<br>Selamat Datang '.ucfirst(auth()->user()->username));
        }

        return back()->with('toast_error', 'Login Gagal, Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
