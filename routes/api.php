<?php

use App\Http\Controllers\Api\CreateSignature;
use App\Http\Controllers\Api\DecryptController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/create/signature', [CreateSignature::class, 'index'])->name('create.signature');
Route::get('/decrypt', [DecryptController::class, 'index'])->name('decrypt.index');
