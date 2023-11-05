<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUser\RoleController;
use App\Http\Controllers\ManageUser\UserController;
use App\Http\Controllers\ManageUser\PermissionController;
use App\Http\Controllers\ManageUser\RoleHasPermissionController;

Route::prefix('super-admin')->name('admin.')->group(function () {
    Route::resource('role', RoleController::class)->middleware(['auth'])->except('show');
    Route::resource('permission', PermissionController::class)->middleware(['auth'])->except('show');
    Route::resource('user', UserController::class)->middleware(['auth'])->except('show');
    Route::resource('role-permission', RoleHasPermissionController::class)->middleware(['auth'])->except('show');

    Route::post('change-role', [UserController::class, 'changeRole'])
        ->name('change.role');
    Route::post('/role/hasPermission', [RoleHasPermissionController::class, 'hasPermission'])->name('rolePermission.postPermission');

    Route::get('/has-role-permission/{id}', [RoleHasPermissionController::class, 'getPermission'])
        ->name('role-permission.get-permission');
});
