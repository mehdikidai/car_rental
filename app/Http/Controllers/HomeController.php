<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home',['cars'=>$this->cars]);
    }

    private $cars = [
        ['id'=>1,'make'=>'germany'],
        ['id'=>2,'make'=>'germany'],
        ['id'=>3,'make'=>'germany'],
        ['id'=>4,'make'=>'germany'],
        ['id'=>5,'make'=>'germany'],
        ['id'=>6,'make'=>'germany']
    ];

}
