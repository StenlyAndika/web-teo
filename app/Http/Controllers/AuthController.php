<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ModelDataSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index() {
        return view('index', [
            'title' => 'Penerimaan Peserta Didik Baru SMP N Kerinci'
        ]);
    }

    public function daftar() {
        return view('auth.daftar', [
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

    public function daftar_akun(Request $request) {
        $validated = $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $validated['is_siswa'] = 0;
        $validated['is_admin'] = 0;

        $rulesSiswa = [
            'nisn' => 'required',
            'nama' => 'required',
            'no_telp' => 'required',
        ];

        $validatedDataSiswa = $request->validate($rulesSiswa);

        ModelDataSiswa::create($validatedDataSiswa);

        User::create($validated);

        return redirect()->route('welcome')->with('toast_success', 'Akun berhasil dibuat! Mohon menunggu verifikasi admin.');
    }

    public function generate()
    {
        $validated['username'] = 'admin';
        $validated['password'] = bcrypt('admin');
        $validated['nama'] = 'Admin';
        $validated['is_siswa'] = '0';
        $validated['is_admin'] = '1';

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

        // Find user by username
        $user = User::where('username', $request->username)->first();

        // If user found, proceed to check role and password
        if ($user) {
            // If user exists but both is_siswa and is_admin are 0
            if ($user->is_siswa != 1 && $user->is_admin != 1) {
                return redirect('login')->with('toast_error', 'Akun belum diverifikasi.');
            }

            // Check password
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->intended('/dashboard')->with(
                    'toast_success',
                    'Login Berhasil, Selamat Datang ' . ucfirst($user->username)
                );
            }
        }

        // If user not found or password invalid
        return back()->with('toast_error', 'Login Gagal, Username atau Password salah!');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
