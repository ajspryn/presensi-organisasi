<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\AgendaEventController;
use App\Http\Controllers\RekapPresensiController;
use App\Http\Controllers\PrintQrPresensiController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::resource('organisasi', OrganisasiController::class);
    Route::resource('presensi', PresensiController::class);
    Route::resource('event', EventController::class);
    Route::resource('agenda', AgendaEventController::class);
    Route::resource('printqr', PrintQrPresensiController::class);
    Route::resource('rekap', RekapPresensiController::class);
    Route::resource('materi', MateriController::class);
    Route::resource('keuangan', KeuanganController::class);
    Route::resource('kelompok', KelompokController::class);
});
