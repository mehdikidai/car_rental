<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Models\Car;




Route::get('/', [HomeController::class, 'index'])->name('frontend.home');

Route::get('/cars', [CarController::class, 'index'])->name('frontend.cars');

Route::get('/car/{id}', [CarController::class, 'show'])->name('car.show')->where(['id' => '[0-9]+']);






Route::get('/carss', function () {
    $cars = Car::with([
        'company' => function ($q) {
            $q->select('id', 'name','logo');
        },
        'model' => function ($q) {
            $q->select('id', 'name');
        }
    ])->get();

    return response()->json($cars);
});
