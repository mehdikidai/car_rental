<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {

        $cars = Car::with([
            'company' => function ($q) {
                $q->select('id', 'name','logo');
            },
            'model' => function ($q) {
                $q->select('id', 'name');
            }
        ])->orderBy('id', 'DESC')->take(9)->get();

        $companies = Company::all();


        return view('frontend.home', compact('cars','companies'));

    }
}
