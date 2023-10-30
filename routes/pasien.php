<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pasien\Frond\SelectOpsiController;
use App\Http\Controllers\Pasien\Frond\VerifiedIdentitasController;
use App\Http\Controllers\Pasien\Frond\RujukanNewController;

Route::prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/verify', [VerifiedIdentitasController::class, 'index'])->name('verify');
    Route::post('/verify', [VerifiedIdentitasController::class, 'store'])->name('verify');
    Route::get('/forget-session', [VerifiedIdentitasController::class, 'forgetSessionIdentitas'])->name('forget');
    Route::get('/select-item', [SelectOpsiController::class, 'index'])->name('dashboard');
    Route::get('/rujukan', [RujukanNewController::class, 'insertSEP'])->name('rujukan.sep');
});
