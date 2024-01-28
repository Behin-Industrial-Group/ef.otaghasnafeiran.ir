<?php

use Illuminate\Support\Facades\Route;
use Mkhodroo\UserRoles\Controllers\GetRoleController;
use Mkhodroo\UserRoles\Controllers\UserController;

Route::name('role.')->prefix('role')->middleware(['web', 'auth','access'])->group(function(){
    Route::get('list-form', [GetRoleController::class, 'listForm'])->name('listForm');
    Route::get('list', [GetRoleController::class, 'list'])->name('list');
    Route::post('get', [GetRoleController::class, 'get'])->name('get');
    Route::post('edit', [GetRoleController::class, 'edit'])->name('edit');
    Route::post('change-user-role', [GetRoleController::class, 'changeUserRole'])->name('changeUserRole');
});

Route::name('user.')->prefix('user')->middleware(['web', 'auth','access'])->group(function(){
    Route::get('list-form', [UserController::class, 'listForm'])->name('listForm');
    Route::get('list', [UserController::class, 'list'])->name('list');
    Route::post('get', [UserController::class, 'get'])->name('get');
    Route::post('edit', [GetRoleController::class, 'edit'])->name('edit');
    Route::post('change-user-role', [GetRoleController::class, 'changeUserRole'])->name('changeUserRole');
});