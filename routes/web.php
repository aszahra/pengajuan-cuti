<?php

use App\Http\Controllers\CutiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\Laporan;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('departemen', DepartemenController::class)->middleware('auth');
Route::resource('jabatan', JabatanController::class)->middleware('auth');
Route::resource('cuti', CutiController::class)->middleware('auth');
Route::resource('pegawai', PegawaiController::class)->middleware('auth');

// Route::get('/pengajuancuti/detail/{id}', [PengajuanCutiController::class, 'showDetail']);
// Route::middleware('auth')->get('/pengajuancuti/detail/{id}', [PengajuanCutiController::class, 'showDetail']);
Route::resource('pengajuancuti', PengajuanCutiController::class)->middleware('auth');

Route::get('/pengajuancuti/{id}', [PengajuanCutiController::class, 'show'])->name('pengajuancuti.show');
Route::put('/status/{id}', [PengajuanCutiController::class, 'updateStatus'])->name('update.status');
Route::resource('laporan', Laporan::class)->middleware('auth');
Route::get('/pengajuancuti/{id}/cetak', [PengajuanCutiController::class, 'cetakSatu'])->name('pengajuancuti.cetak.satu');

// Route::get('/register', 'LoginController@showLoginForm')->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('error', ErrorController::class);
});

require __DIR__.'/auth.php';
