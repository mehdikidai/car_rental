<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $cars = Car::orderBy('id', 'DESC')->take(6)->get();
        return view('frontend.home',compact('cars'));
    }


}
