<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(9);

        //dd($cars);

        if ($cars->currentPage() > $cars->lastPage()) {
            return abort(404);
        }

        return view('frontend.cars', compact('cars'));
    }

}
