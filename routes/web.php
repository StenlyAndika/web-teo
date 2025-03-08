<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PPDBController;

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
Route::get('/pendaftaran-peserta-didik-baru-ta-2025-2026', [PPDBController::class, 'index'])->name('ppdb')->middleware('guest');
Route::get('/success', [AuthController::class, 'success'])->name('success')->middleware('guest');
// Route::post('/login', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
// Route::post('/generate', [AuthController::class, 'generate'])->name('generateadmin')->middleware(['guest', 'checkadmin']);

Route::post('/admin/master/ppdb', [PPDBController::class, 'store'])->name('admin.ppdb.store');

// Route::middleware(['admin'])->group(function () {
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//     Route::get('/admin/master/jaksa', [JaksaController::class, 'index'])->name('admin.jaksa.index');
//     Route::post('/admin/master/jaksa', [JaksaController::class, 'store'])->name('admin.jaksa.store');
//     Route::put('/admin/master/jaksa/{id}', [JaksaController::class, 'update'])->name('admin.jaksa.update');
//     Route::delete('/admin/master/jaksa/{id}', [JaksaController::class, 'destroy'])->name('admin.jaksa.destroy');
// });
