<?php

use App\Http\Controllers\DashboradController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\NamayeshgahController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Mkhodroo\Cities\Controllers\CityController;
use Spatie\SimpleExcel\SimpleExcelReader;


Route::name('download.')->prefix('download')->middleware(['auth'])->group(function () {
    Route::get('from-public-folder/{name}', [DownloadController::class, 'fromPublicFolder'])->name('fromPublicFolder');
});
