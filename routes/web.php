<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\SearchController;
use App\Models\ModelCar;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');


Route::controller(CarController::class)->group(function () {

    Route::get('/cars', 'index')->name('frontend.cars');
    Route::get('/car/{id}', 'show')->middleware('guest')->name('car.show')->where(['id' => '[0-9]+']);
});



Route::post('/rental', [RentalController::class, 'store'])->name('rental.store');


Route::post('/search', [SearchController::class, 'show'])->name('search.home');


Route::get('/login', function () {

    return "<h1>page login</h1>";
})->name('login');






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