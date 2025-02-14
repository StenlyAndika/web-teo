<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JaksaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelimpahanController;
use App\Http\Controllers\PenerimaanSPDPController;
use App\Http\Controllers\InstansiPenyidikController;
use App\Http\Controllers\InstansiPelaksanaController;
use App\Http\Controllers\WilayahPelimpahanController;
use App\Http\Controllers\PenerimaanBerkasTIController;

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
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::post('/generate', [AuthController::class, 'generate'])->name('generateadmin')->middleware(['guest', 'checkadmin']);

Route::middleware(['admin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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

    Route::get('/admin/prapen/penspdp', [PenerimaanSPDPController::class, 'index'])->name('admin.penspdp.index');
    Route::get('/admin/prapen/penspdp/create', [PenerimaanSPDPController::class, 'create'])->name('admin.penspdp.create');
    Route::post('/admin/prapen/penspdp', [PenerimaanSPDPController::class, 'store'])->name('admin.penspdp.store');
    Route::post('/admin/temptersangka', [PenerimaanSPDPController::class, 'temptersangkastore'])->name('admin.temptersangka.store');
    Route::delete('/admin/prapen/penspdp/{id}', [PenerimaanSPDPController::class, 'destroy'])->name('admin.penspdp.destroy');

    Route::get('/admin/prapen/penbt1', [PenerimaanBerkasTIController::class, 'index'])->name('admin.penbt1.index');
    Route::get('/admin/prapen/penbt1/create', [PenerimaanBerkasTIController::class, 'create'])->name('admin.penbt1.create');
    Route::get('/data-spdp/{index}', [PenerimaanBerkasTIController::class, 'data_spdp'])->name('data_spdp');
    Route::get('/data-jaksa', [PenerimaanBerkasTIController::class, 'data_jaksa'])->name('data_jaksa');
    Route::get('/get-temp-jaksa', [PenerimaanBerkasTIController::class, 'get_temp_jaksa'])->name('get_temp_jaksa');
    Route::post('/set-temp-jaksa', [PenerimaanBerkasTIController::class, 'set_temp_jaksa'])->name('set_temp_jaksa');
    Route::delete('/delete-temp-jaksa/{id}', [PenerimaanBerkasTIController::class, 'delete_temp_jaksa']);
    Route::post('/admin/prapen/penbt1', [PenerimaanBerkasTIController::class, 'store'])->name('admin.penbt1.store');
    Route::delete('/admin/prapen/penbt1/{id}', [PenerimaanBerkasTIController::class, 'destroy'])->name('admin.penbt1.destroy');

    Route::get('/admin/prapen/pelimpahan', [PelimpahanController::class, 'index'])->name('admin.pelimpahan.index');
    Route::post('/admin/prapen/pelimpahan', [PelimpahanController::class, 'store'])->name('admin.pelimpahan.store');
    Route::delete('/admin/prapen/pelimpahan/{id}', [PelimpahanController::class, 'destroy'])->name('admin.pelimpahan.destroy');

    Route::get('/admin/laporan/p16', [LaporanController::class, 'laporan_p16'])->name('admin.laporan.p16');
    Route::get('/admin/laporan/pelimpahan', [LaporanController::class, 'laporan_pelimpahan'])->name('admin.laporan.pelimpahan');
    Route::get('/admin/laporan/pelimpahan/print/{bln}', [LaporanController::class, 'laporan_pelimpahan_print'])->name('admin.pelimpahan.print');
});
