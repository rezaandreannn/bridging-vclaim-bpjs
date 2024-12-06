<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Anjungan\FormMrController;
use App\Http\Controllers\Anjungan\NewRujukanController;
use App\Http\Controllers\Anjungan\StoreSessionController;

Route::get('form-nomr', FormMrController::class)->name('form-nomr');
Route::post('form-nomr', StoreSessionController::class)->name('form.store');
Route::get('anjungan/create/sep/{noIdentias}', NewRujukanController::class)->name('sep.new');
