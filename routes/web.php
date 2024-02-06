<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Mkhodroo\Cities\Controllers\CityController;
use Mkhodroo\ValueChain\Models\Isic;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

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
    $rows = SimpleExcelReader::create(public_path('cat2.xlsx'))->getRows();
    $rows = SimpleExcelReader::create(public_path('Book13.xlsx'))->getRows();
    $newExcel = SimpleExcelWriter::create(public_path('newExcel.xlsx'));
    echo "<pre>";
    $rows->each(function (array $rowProperties) use ($newExcel) {
        print_r($rowProperties);
        $province = $rowProperties['province'];
        $name = "رئیس کل وزارت صمت استان " . $province;
        $username = $rowProperties['mobile'];
        $password = $username;
        // $city_id = CityController::create($province, $city)->id;
        $user = User::create([
            'name' => $name,
            'email' => "$username",
            'password' => Hash::make($password),
            'role_id' => 7
            // 'city_id' => $city_id
        ]);
        UserInfo::create([
            'user_id' => $user->id,
            'fname' => $rowProperties['name'],
            'mobile' => "$username",
        ]);
        // for ($i = 3; $i < 29; $i++) {
        //     $str = str_replace("(", "", $rowProperties[$i]);
        //     $str = str_replace(")", "", $rowProperties[$i]);
        //     if (!in_array($str, [
        //         "",
        //         "و",
        //         "های",
        //         "در",
        //         "ها",
        //         "خرده",
        //         "عمده",
        //         "(",
        //         ")",
        //         "به",
        //         "آن",
        //         "است",
        //         "فروشی",
        //         "بندی",
        //         "نشده",
        //         "جای",
        //         "دیگر",
        //         "،",
        //         "ای",
        //         "سایر",
        //         "فعالیتهای",
        //         "فعالیت",
        //         "مرتبط",
        //         "غیر",
        //         "عرضه",
        //         "پس",
        //         "از",
        //         "کم",
        //         "بر",
        //         "در",
        //         "که",
        //         "انواع",
        //         "فروش",
        //         "لوازم",
        //         "تعمیر",
        //         "نمایندگی",
        //         "آلات",
        //         "تجهیزات",
        //         "کاری",
        //         "وسایل",
        //         "مواد",
        //         "بسته",
        //         "سازی",
        //         "تولید",
        //         "خدمات",
        //         "-",
        //         "بصورت",
        //         "العمل",
        //         "حق",
        //         "--",
        //         "_",
        //         "__",
        //         "محصولات",
        //         "پزی",
        //         "قطعات",
        //         "وتعمیر",
        //         "نیازمندی",
        //         "محور",
        //         "(است",
        //         "جز",
        //         "بجز",
        //         "جهت",
        //         "دستگاههای",
        //         "دستگاه",
        //         "ـ",
        //         "–",
        //         "نصب",
        //         "اداری",
        //         "کالا",
        //         "گری",
        //         "ارائه",
        //         "کالاهای",
        //         "یا",
        //         "بدون",
        //         "بی",
        //         "برای",
        //         "پیش",
        //         "زیر",
        //         "با",
        //         "زنی",
        //         "صنایع",
        //         "فروشندگی",
        //         "سبک",
        //         "سنگین",
        //         "سنتی",
        //         "",
        //         "",
        //         "",
        //         "",
        //         "",

        //     ])){
        //         $newExcel->addRow([
        //             'word' => $str,
        //             'catagory' => $rowProperties[2],
        //             'isic' => $rowProperties[1]
        //         ]);
        //     }

        // }
    });
});

Route::get('/build-app', function () {
    Artisan::call('migrate');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/2', function () {
    return view('welcome2');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/dashboard.php';
require __DIR__ . '/namayeshgah.php';
require __DIR__ . '/download.php';
