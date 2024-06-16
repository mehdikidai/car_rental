<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //$cars = Car::orderBy('id', 'DESC')->take(9)->get();

        $cars = Car::with([
            'company' => function ($q) {
                $q->select('id', 'name','logo');
            },
            'model' => function ($q) {
                $q->select('id', 'name');
            }
        ])->orderBy('id', 'DESC')->take(9)->get();


        return view('frontend.home', compact('cars'));
    }
}
