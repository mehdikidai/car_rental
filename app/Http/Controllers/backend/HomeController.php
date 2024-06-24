<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {


        $q = User::with(['customer' => function ($query) {

            $query->select('id','user_id','phone','address','city');

        }])->where('is_admin',0)->latest('id')->limit(6)->get();

        $users = $q->filter(function ($user) {

            return $user->customer !== null;

        });
        
        return view('backend.home',compact('users'));

    }
}
