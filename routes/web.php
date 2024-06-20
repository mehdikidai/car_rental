<?php

use App\Models\Car;
use App\Models\ModelCar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LanguageController;




Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::controller(CarController::class)->group(function () {

    Route::get('/cars', 'index')->name('frontend.cars');
    Route::get('/car/{id}', 'show')->middleware('auth')->name('car.show')->where(['id' => '[0-9]+']);
    
});


Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');

Route::delete('/rental/{id}',[RentalController::class,'destroy'])->name('rental.destroy')->where(['id' => '[0-9]+']);


Route::get('/get-booked-days/{car_id}', [RentalController::class, 'getBookedDays'])->where(['id' => '[0-9]+']);

Route::get('/search', [SearchController::class, 'show'])->name('search.frontend.home');

Route::controller(AuthController::class)->group(function () {

    Route::middleware(['guest'])->group(function () {

        Route::get('/login', 'index')->name('login');
        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'store')->name('user.store');
        Route::post('/login', 'login')->name('login.login');

    });

    Route::middleware(['auth'])->group(function () {

        Route::get('/logout', 'logout')->name('logout');
        
    });
});



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'showPage'])->name('profile.show-page');
});


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');




Route::get('/carss', function () {
    $cars = Car::with([
        'model' => function ($q) {
            $q->select('id', 'name', 'company_id') // Make sure to include the foreign key
                ->with(['company' => function ($qq) {
                    $qq->select('id', 'name');
                }]);
        }
    ])->get();

    return response()->json($cars);
});


Route::get('/mm', function () {

    $m = ModelCar::with(['company' => function ($q) {
        $q->select('id', 'name');
    }])->get();
    return response()->json($m);
});


// 'company' => function ($q) {
//             $q->select('id', 'name', 'logo');
//         },