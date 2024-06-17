<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SearchController;



Route::get('/', [HomeController::class, 'index'])->name('frontend.home');


Route::controller(CarController::class)->group(function () {

    Route::get('/cars', 'index')->name('frontend.cars');
    Route::get('/car/{id}', 'show')->middleware('guest')->name('car.show')->where(['id' => '[0-9]+']);

});



Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');


Route::post('/search',[SearchController::class,'show'])->name('search.home');


Route::get('/login', function () {

    return "<h1>page login</h1>";
})->name('login');






Route::get('/carss', function () {
    $cars = Car::with([
        'company' => function ($q) {
            $q->select('id', 'name', 'logo');
        },
        'model' => function ($q) {
            $q->select('id', 'name');
        }
    ])->get();

    return response()->json($cars);
});
