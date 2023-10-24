<?php

use App\Http\Controllers\Pasien\VerifiedIdentitasController;
use Illuminate\Support\Facades\Route;

Route::prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/verify', [VerifiedIdentitasController::class, 'index'])->name('verify');
});
