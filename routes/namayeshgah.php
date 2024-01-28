<?php

use App\Http\Controllers\DashboradController;
use App\Http\Controllers\NamayeshgahController;
use App\Http\Controllers\NamayeshgahInfoController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Mkhodroo\Cities\Controllers\CityController;
use Spatie\SimpleExcel\SimpleExcelReader;


Route::name('namayeshgah.')->prefix('namayeshgah')->middleware(['auth'])->group(function () {
    Route::name('form.')->prefix('form')->group(function () {
        Route::get('add', [NamayeshgahController::class, 'addForm'])->name('add');
        Route::get('edit/{id}', [NamayeshgahController::class, 'editForm'])->name('edit');
        Route::post('modal', [NamayeshgahController::class, 'modal'])->name('modal');
    });

    Route::get('get/{id}', [NamayeshgahController::class, 'getById'])->name('getById');
    Route::get('get-mine', [NamayeshgahController::class, 'getMine'])->name('getMine');
    Route::post('add', [NamayeshgahController::class, 'add'])->name('add');
    Route::post('delete-file', [NamayeshgahController::class, 'deleteFile'])->name('deleteFile');
});


Route::name('namayeshgahInfo.')->prefix('namayeshgah-info')->middleware(['auth', 'access'])->group(function () {
    Route::name('form.')->prefix('form')->group(function () {
        Route::get('list', [NamayeshgahInfoController::class, 'listForm'])->name('list');
        Route::get('edit/{id}', [NamayeshgahInfoController::class, 'editForm'])->name('edit');
    });

    Route::get('list', [NamayeshgahInfoController::class, 'list'])->name('list');
    Route::get('get/{id}', [NamayeshgahInfoController::class, 'getById'])->name('getById');

    Route::name('report.')->prefix('report')->group(function () {
        Route::get('summary', [NamayeshgahInfoController::class, 'summary'])->name('summary');
    });
});
