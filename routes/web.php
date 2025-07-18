<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PPDBController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('welcome')->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/daftar', [AuthController::class, 'daftar_akun'])->name('daftar_akun')->middleware('guest');
Route::post('/generate', [AuthController::class, 'generate'])->name('generateadmin')->middleware(['guest', 'checkadmin']);

Route::post('/sendwhatsapp', [DashboardController::class, 'sendMessage'])->name('admin.send.wa')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['siswa'])->group(function () {
    Route::get('/pendaftaran-peserta-didik-baru-ta-2025-2026', [PPDBController::class, 'index'])->name('ppdb');
    Route::post('/pendaftaran-peserta-didik-baru-ta-2025-2026', [PPDBController::class, 'store'])->name('admin.ppdb.store');
    Route::get('/success', [AuthController::class, 'success'])->name('success');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::put('/admin/user/{nisn}/lulus', [UserController::class, 'userUpdateV'])->name('admin.user.verif');
    Route::put('/admin/user/{nisn}/gagal', [UserController::class, 'userUpdateT'])->name('admin.user.tolak');

    Route::get('/admin/ppdb', [PPDBController::class, 'ppdbData'])->name('admin.ppdb.index');
    Route::get('/admin/ppdb/{id}', [PPDBController::class, 'ppdbDetail'])->name('admin.ppdb.detail');
    Route::put('/admin/ppdb/{id}/lulus', [PPDBController::class, 'ppdbUpdateL'])->name('admin.ppdb.lulus');
    Route::put('/admin/ppdb/{id}/gagal', [PPDBController::class, 'ppdbUpdateG'])->name('admin.ppdb.gagal');

    Route::get('/admin/laporan/ppdb', [LaporanController::class, 'laporan_ppdb'])->name('admin.laporan.ppdb');
    Route::get('/admin/laporan/ppdb/print/{bln}', [LaporanController::class, 'laporan_ppdb_print'])->name('admin.ppdb.print');
});
