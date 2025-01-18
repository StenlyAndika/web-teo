<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JaksaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenerimaanSPDPController;
use App\Http\Controllers\InstansiPenyidikController;
use App\Http\Controllers\InstansiPelaksanaController;
use App\Http\Controllers\WilayahPelimpahanController;

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

Route::get('/admin/master/jaksa', [JaksaController::class, 'index'])->name('admin.jaksa.index');
Route::post('/admin/master/jaksa', [JaksaController::class, 'store'])->name('admin.jaksa.store');
Route::put('/admin/master/jaksa/{id}', [JaksaController::class, 'update'])->name('admin.jaksa.update');
Route::delete('/admin/master/jaksa/{id}', [JaksaController::class, 'destroy'])->name('admin.jaksa.destroy');

Route::get('/admin/master/instansipenyidik', [InstansiPenyidikController::class, 'index'])->name('admin.instansipenyidik.index');
Route::post('/admin/master/instansipenyidik', [InstansiPenyidikController::class, 'store'])->name('admin.instansipenyidik.store');
Route::put('/admin/master/instansipenyidik/{id}', [InstansiPenyidikController::class, 'update'])->name('admin.instansipenyidik.update');
Route::delete('/admin/master/instansipenyidik/{id}', [InstansiPenyidikController::class, 'destroy'])->name('admin.instansipenyidik.destroy');

Route::get('/admin/master/instansipelaksana', [InstansiPelaksanaController::class, 'index'])->name('admin.instansipelaksana.index');
Route::post('/admin/master/instansipelaksana', [InstansiPelaksanaController::class, 'store'])->name('admin.instansipelaksana.store');
Route::put('/admin/master/instansipelaksana/{id}', [InstansiPelaksanaController::class, 'update'])->name('admin.instansipelaksana.update');
Route::delete('/admin/master/instansipelaksana/{id}', [InstansiPelaksanaController::class, 'destroy'])->name('admin.instansipelaksana.destroy');

Route::get('/admin/master/wilayahpelimpahan', [WilayahPelimpahanController::class, 'index'])->name('admin.wilayahpelimpahan.index');
Route::post('/admin/master/wilayahpelimpahan', [WilayahPelimpahanController::class, 'store'])->name('admin.wilayahpelimpahan.store');
Route::put('/admin/master/wilayahpelimpahan/{id}', [WilayahPelimpahanController::class, 'update'])->name('admin.wilayahpelimpahan.update');
Route::delete('/admin/master/wilayahpelimpahan/{id}', [WilayahPelimpahanController::class, 'destroy'])->name('admin.wilayahpelimpahan.destroy');

Route::get('/admin/prapenuntutan/penerimaanspdp', [PenerimaanSPDPController::class, 'index'])->name('admin.penerimaanspdp.index');
Route::get('/admin/prapenuntutan/penerimaanspdp/create', [PenerimaanSPDPController::class, 'create'])->name('admin.penerimaanspdp.create');
Route::post('/admin/prapenuntutan/penerimaanspdp', [PenerimaanSPDPController::class, 'store'])->name('admin.penerimaanspdp.store');

// Route::get('/admin/perkara', [PerkaraController::class, 'index'])->name('admin.perkara.index');
// Route::post('/admin/perkara', [PerkaraController::class, 'store'])->name('admin.perkara.store');
// Route::put('/admin/perkara/{id}', [PerkaraController::class, 'update'])->name('admin.perkara.update');
// Route::delete('/admin/perkara/{id}', [PerkaraController::class, 'destroy'])->name('admin.perkara.destroy');
// Route::get('/admin/laporan/perkara', [PerkaraController::class, 'laporan'])->name('admin.perkara.laporan');
// Route::get('/admin/laporan/perkara/print/{bln}', [PerkaraController::class, 'print'])->name('admin.perkara.print');
