<?php

use App\Http\Controllers\Pasien\InsertSepByRujukan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\SelectOpsiController;
use App\Http\Controllers\Pasien\SelectedRujukanController;
use App\Http\Controllers\Pasien\VerifiedIdentitasController;

Route::prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/verify', [VerifiedIdentitasController::class, 'index'])->name('verify');
    Route::post('/verify', [VerifiedIdentitasController::class, 'store'])->name('verify');
    Route::get('/forget-session', [VerifiedIdentitasController::class, 'forgetSessionIdentitas'])->name('forget');
    Route::get('/selectOpsi', [SelectOpsiController::class, 'index'])->name('dashboard');
    Route::get('/rujukan', [InsertSepByRujukan::class, 'insertSEP'])->name('rujukan.sep');
    Route::get('/selectDokter', [SelectedRujukanController::class, 'index'])->name('selectDokter');
});
