<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RentalController extends Controller
{
    public  function store(Request $request)
    {

        $data = $request->validate([

            'car_id' => 'required|integer|exists:cars,id',
            'rental_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:return_date'],
            'return_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:rental_date'],

        ]);

        $rental_date   = Carbon::parse($data['rental_date']);
        $return_date   = Carbon::parse($data['return_date']);
        $allDays = $rental_date->diffInDays($return_date);
        $car     = Car::findOrFail($data['car_id']);
        $total_price = $car->rental_price * $allDays;
        $user_id = Auth::user()->id;

        

        
    }
}
