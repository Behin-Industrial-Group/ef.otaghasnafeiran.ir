<?php

use Illuminate\Support\Facades\Route;
use Mkhodroo\Cities\Controllers\CityController;
use Mkhodroo\EventManager\Controllers\EventController;
use Mkhodroo\EventManager\Controllers\ViewController;


Route::prefix('em')->group(function(){
    Route::name('form.')->prefix('form')->middleware(['web'])->group(function(){
        Route::get('add-event', [ViewController::class, 'addEventForm']);
        Route::get('edit');
        Route::get('delete');
        Route::get('get');
        Route::get('all');
    });
    
    Route::name('event.')->prefix('event')->middleware(['web'])->group(function(){
        Route::get('add', [EventController::class, 'add'])->name('add');
        Route::get('edit');
        Route::get('delete');
        Route::get('get');
        Route::get('all');
    });
    
    Route::name('meeting.')->prefix('meeting')->middleware(['web'])->group(function(){
        Route::get('add');
        Route::get('edit');
        Route::get('delete');
        Route::get('get');
        Route::get('all');
    });
});