<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEP\CariController;
use App\Http\Controllers\Referensi\DpjpController;
use App\Http\Controllers\Rujukan\RujukanController;
use App\Http\Controllers\SEP\FingerPrintController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Frond\VerifikasiIdentitasController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [VerifikasiIdentitasController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/verifikasi', [VerifikasiIdentitasController::class, 'proses'])->middleware(['auth'])->name('verifikasi.identitas');



Route::get('rujukan/{nomorRujukan}', [RujukanController::class, 'byNomorRujukan'])->name('rujukan.index');

Route::get('dpjp', [DpjpController::class, 'getDpjp']);

Route::get('SEP/{nomorSEP}', [CariController::class, 'index']);
Route::get('/SEP/finger/{tanggal}', [FingerPrintController::class, 'index']);
Route::get('SEP/{noSEP}', [CariController::class, 'index']);

require __DIR__ . '/auth.php';
