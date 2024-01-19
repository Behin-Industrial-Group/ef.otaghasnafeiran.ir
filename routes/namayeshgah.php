<?php

use App\Http\Controllers\DashboradController;
use App\Http\Controllers\NamayeshgahController;
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
    });

    Route::get('get-mine', [NamayeshgahController::class, 'getMine'])->name('getMine');
    Route::post('add', [NamayeshgahController::class, 'add'])->name('add');

});
