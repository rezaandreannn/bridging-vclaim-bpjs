<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SEP\CariController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Referensi\PoliController;
use App\Http\Controllers\SEP\FingerPrintController;
use App\Http\Controllers\Referensi\FaskesController;
use App\Http\Controllers\Referensi\DiagnosaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'login']);

Route::group(['prefix' => 'referensi', 'as' => 'referensi.'], function () {
    Route::get('diagnosa/{namaKodeDiagnosa}', [DiagnosaController::class, 'getDiagnosa'])
        ->name('diagnosa');
    Route::get('poli/{namaKodePoli}', [PoliController::class, 'getPoli'])
        ->name('poli');
    Route::get('faskes/{namaKodeFaskes}/{jenisFaskes}', [FaskesController::class, 'getFaskes'])
        ->name('faskes');
});

Route::group(['prefix' => 'SEP', 'as' => 'SEP.'], function () {
    Route::get('/{kode}', [CariController::class, 'index'])->name('cari.index');
    Route::get('finger/{tanggalPelayanan}', [FingerPrintController::class, 'index'])
        ->name('finger.index');
    Route::get('finger/peserta/{noKartu}/tanggalPelayanan/{tanggalPelayanan}', [FingerPrintController::class, 'getNoKartu'])
        ->name('finger.peserta');
});
