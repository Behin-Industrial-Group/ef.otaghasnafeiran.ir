<?php

use BehinFindOldIsic\App\Http\Controllers\BehinFindOldIsicController;
use Illuminate\Support\Facades\Route;

Route::name('isic.')->prefix('isic')->group(function(){
    Route::get('/step1', [BehinFindOldIsicController::class, 'step1Form'])->name('step1Form');
    Route::post('/step1', [BehinFindOldIsicController::class, 'step1'])->name('step1');
    Route::get('/step2/{unique_id}', [BehinFindOldIsicController::class, 'step2Form'])->name('step2Form');
    Route::post('/step2', [BehinFindOldIsicController::class, 'step2'])->name('step2');
    Route::get('/step3/{unique_id}', [BehinFindOldIsicController::class, 'step3Form'])->name('step3Form');
    Route::post('/step3', [BehinFindOldIsicController::class, 'step3'])->name('step3');

});
