<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentalController extends Controller
{
    public  function store(Request $request)
    {

        $data = $request->validate([

            'car_id' => 'required|integer|exists:cars,id',
            'rental_date' => ['required', 'date_format:d/m/Y', 'before_or_equal:return_date'],
            'return_date' => ['required', 'date_format:d/m/Y', 'after_or_equal:rental_date'],

        ]);

        dd($data);
    }
}
