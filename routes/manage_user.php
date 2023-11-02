<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUser\RoleController;
use App\Http\Controllers\ManageUser\PermissionController;

Route::prefix('super-admin')->name('admin.')->group(function () {
    Route::resource('role', RoleController::class)->middleware(['auth'])->except('show');
    Route::resource('permission', PermissionController::class)->middleware(['auth'])->except('show');
});
