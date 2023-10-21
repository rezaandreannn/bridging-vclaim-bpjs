<?php

use App\Http\Controllers\Auth\AuthenticatedPesertaController;

Route::get('/login', [AuthenticatedPesertaController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedPesertaController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthenticatedPesertaController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
