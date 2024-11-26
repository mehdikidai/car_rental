<?php

use App\Models\Car;
use App\Models\ModelCar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AuthController as BackendAuthController;
use App\Http\Controllers\backend\CarController as BackendCarController;
use App\Http\Controllers\backend\CompanyController;
use App\Http\Controllers\backend\HomeController as BackendHomeController;
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

Route::delete('/rental/{id}', [RentalController::class, 'destroy'])->name('rental.destroy')->where(['id' => '[0-9]+']);


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
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/edit', [ProfileController::class, 'update'])->name('profile.update');

});


Route::get('lang/{lang}', [LanguageController::class, 'switchLang'])->name('lang.switch');





// space admin ----------------


Route::prefix('admin')->name('backend.')->middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/', [BackendHomeController::class, 'index'])->name('home');

    Route::get('/cars', [BackendCarController::class, 'index'])->name('cars');


    Route::delete('/car/{id}', [BackendCarController::class, 'destroy'])->name('car.destroy');

    Route::delete('/user/{id}', [BackendAuthController::class, 'destroy'])->name('user.destroy');

    Route::put('/cars/{id}', [BackendCarController::class, 'update'])->name('car.update');

    Route::get('/car/{id}/edit', [BackendCarController::class, 'edit'])->name('car.edit');

    Route::get('/car/create', [BackendCarController::class, 'create'])->name('car.create');

    Route::post('/car', [BackendCarController::class, 'store'])->name('car.store');

    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
});
