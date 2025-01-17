<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HakimController;
use App\Http\Controllers\JaksaController;
use App\Http\Controllers\SidangController;
use App\Http\Controllers\PerkaraController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengacaraController;
use App\Http\Controllers\CatatanPerkaraController;

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

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::get('/admin/master/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
Route::post('/admin/master/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
Route::put('/admin/master/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
Route::delete('/admin/master/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

Route::get('/admin/master/pengacara', [PengacaraController::class, 'index'])->name('admin.pengacara.index');
Route::post('/admin/master/pengacara', [PengacaraController::class, 'store'])->name('admin.pengacara.store');
Route::put('/admin/master/pengacara/{id}', [PengacaraController::class, 'update'])->name('admin.pengacara.update');
Route::delete('/admin/master/pengacara/{id}', [PengacaraController::class, 'destroy'])->name('admin.pengacara.destroy');

Route::get('/admin/master/jaksa', [JaksaController::class, 'index'])->name('admin.jaksa.index');
Route::post('/admin/master/jaksa', [JaksaController::class, 'store'])->name('admin.jaksa.store');
Route::put('/admin/master/jaksa/{id}', [JaksaController::class, 'update'])->name('admin.jaksa.update');
Route::delete('/admin/master/jaksa/{id}', [JaksaController::class, 'destroy'])->name('admin.jaksa.destroy');

Route::get('/admin/master/hakim', [HakimController::class, 'index'])->name('admin.hakim.index');
Route::post('/admin/master/hakim', [HakimController::class, 'store'])->name('admin.hakim.store');
Route::put('/admin/master/hakim/{id}', [HakimController::class, 'update'])->name('admin.hakim.update');
Route::delete('/admin/master/hakim/{id}', [HakimController::class, 'destroy'])->name('admin.hakim.destroy');

Route::get('/admin/perkara', [PerkaraController::class, 'index'])->name('admin.perkara.index');
Route::post('/admin/perkara', [PerkaraController::class, 'store'])->name('admin.perkara.store');
Route::put('/admin/perkara/{id}', [PerkaraController::class, 'update'])->name('admin.perkara.update');
Route::delete('/admin/perkara/{id}', [PerkaraController::class, 'destroy'])->name('admin.perkara.destroy');
Route::get('/admin/laporan/perkara', [PerkaraController::class, 'laporan'])->name('admin.perkara.laporan');
Route::get('/admin/laporan/perkara/print/{bln}', [PerkaraController::class, 'print'])->name('admin.perkara.print');

Route::get('/admin/sidang', [SidangController::class, 'index'])->name('admin.sidang.index');
Route::post('/admin/sidang', [SidangController::class, 'store'])->name('admin.sidang.store');
Route::put('/admin/sidang/{id}', [SidangController::class, 'update'])->name('admin.sidang.update');
Route::delete('/admin/sidang/{id}', [SidangController::class, 'destroy'])->name('admin.sidang.destroy');
Route::get('/admin/laporan/sidang', [SidangController::class, 'laporan'])->name('admin.sidang.laporan');
Route::get('/admin/laporan/sidang/print/{bln}', [SidangController::class, 'print'])->name('admin.sidang.print');

Route::get('/admin/catatan', [CatatanPerkaraController::class, 'index'])->name('admin.catatan.index');
Route::post('/admin/catatan', [CatatanPerkaraController::class, 'store'])->name('admin.catatan.store');
Route::put('/admin/catatan/{id}', [CatatanPerkaraController::class, 'update'])->name('admin.catatan.update');
Route::delete('/admin/catatan/{id}', [CatatanPerkaraController::class, 'destroy'])->name('admin.catatan.destroy');
Route::get('/admin/laporan/catatan', [CatatanPerkaraController::class, 'laporan'])->name('admin.catatan.laporan');
Route::get('/admin/laporan/catatan/print/{bln}', [CatatanPerkaraController::class, 'print'])->name('admin.catatan.print');
