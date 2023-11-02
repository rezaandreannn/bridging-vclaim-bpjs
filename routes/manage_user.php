<?php

use App\Http\Controllers\ManageUser\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('super-admin')->name('admin.')->group(function () {
    Route::resource('role', RoleController::class)->middleware(['auth'])->except('show');
});
