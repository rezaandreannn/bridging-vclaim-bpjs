<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEP\CariController;
use App\Http\Controllers\Referensi\DpjpController;
use App\Http\Controllers\Rujukan\RujukanController;
use App\Http\Controllers\SEP\FingerPrintController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frond\NewRujukanController;
use App\Http\Controllers\Frond\SepController;
use App\Http\Controllers\Frond\SuratKontrolController;
use App\Http\Controllers\Frond\VerifikasiIdentitasController;
use App\Http\Controllers\RencanaKontrol\RencanaKontrolController;
use App\Http\Controllers\SEP\HistoyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::get('/app', function () {
    return view('layouts.app');
})->name('app');

Route::get('/dashboard', [VerifikasiIdentitasController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/verifikasi', [VerifikasiIdentitasController::class, 'proses'])->middleware(['auth'])->name('verifikasi.identitas');
Route::get('/rujukan/{nomorKartu}', [VerifikasiIdentitasController::class, 'selectRujukan'])->middleware(['auth'])->name('rujukan.select');
Route::get('/rujukan/baru/{nomorKartu}', [NewRujukanController::class, 'index'])->middleware(['auth'])->name('rujukan.baru');
Route::get('/suratkontrol/{nomorKartu}', [SuratKontrolController::class, 'index'])->middleware(['auth'])->name('surat.kontrol');

// SEP
Route::get('sep/{nomorKartu}', [SepController::class, 'index']);
Route::get('sep/cari/{nomorSep}', [CariController::class, 'index']);
Route::get('rencana', [RencanaKontrolController::class, 'index']);
Route::get('khusus', [RujukanController::class, 'listRujukanKhusus']);
Route::get('sep/history/{nomorKartu}', [HistoyController::class, 'index']);


Route::get('/rujukan/biodata/{noIdentitas}', [VerifikasiIdentitasController::class, 'identitas'])->middleware(['auth'])->name('rujukan.biodata');
Route::get('/rujukan/list/{noIdentitas}', [VerifikasiIdentitasController::class, 'listRujukan'])->middleware(['auth'])->name('rujukan.list');



Route::get('rujukan/{nomorRujukan}', [RujukanController::class, 'byNomorRujukan'])->name('rujukan.index');

Route::get('dpjp', [DpjpController::class, 'getDpjp']);

Route::get('SEP/{nomorSEP}', [CariController::class, 'index']);
Route::get('/SEP/finger/{tanggal}', [FingerPrintController::class, 'index']);
Route::get('SEP/{noSEP}', [CariController::class, 'index']);

require __DIR__ . '/auth.php';
