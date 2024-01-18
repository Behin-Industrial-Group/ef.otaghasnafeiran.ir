<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Mkhodroo\Cities\Controllers\CityController;
use Spatie\SimpleExcel\SimpleExcelReader;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/import-user', function () {
    $rows = SimpleExcelReader::create(public_path('Book1.xlsx'))->getRows();
    // echo "<pre>";
    // $rows->each(function(array $rowProperties){
    //     if($rowProperties['همراه']){
    //         print_r($rowProperties);
    //         $province = $rowProperties['استان'];
    //         $city = $rowProperties['شهرستان'];
    //         $name = "اتاق اصناف شهرستان ". $city;
    //         $username = $rowProperties['همراه'];
    //         $password = $username;
            
    //         $city_id = CityController::create($province, $city)->id;

    //         $user = User::create([
    //             'name' => $name,
    //             'email' => $username,
    //             'password' => Hash::make($password),
    //             'city_id' => $city_id
    //         ]);

    //         UserInfo::create([
    //             'user_id' => $user->id,
    //             'fname' => $rowProperties['نام'],
    //             'lname' => $rowProperties['نام خانوادگی'],
    //             'mobile' => $rowProperties['همراه'],
    //             'phone' => $rowProperties['تلفن ثابت'],
    //             'address' => $rowProperties['آدرس'],
    //         ]);
    //     }
    // });
});

Route::get('/build-app', function () {
    Artisan::call('migrate');
});

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';
