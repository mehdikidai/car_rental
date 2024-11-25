<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {

        $cars = Car::with([

            'company' => fn($q) => $q->select('id', 'name'),
            'model' => fn($q) => $q->select('id', 'name')

        ])->orderBy('id', 'DESC')->take(9)->get();


        $companies = Cache::rememberForever('companies', function(){

            return Car::with('company:id,name')->get()->pluck('company')->unique();
            
        });

        return view('frontend.home', compact('cars', 'companies'));

    }
}
