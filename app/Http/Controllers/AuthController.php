<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }


     /**
     *   login -------------
     */


    public function login(Request $request)
    {

        $user = $request->validate([

            'email'=> 'required|email',
            'password' => 'required|min:8|max:30'

        ]);

        if (Auth::attempt($user,true)) {

            $request->session()->regenerate();
            return redirect()->route('frontend.home');

        } 

        return back()->withInput()->with('error', 'test');

    }

     /**
     *   logout -------------
     */


    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
