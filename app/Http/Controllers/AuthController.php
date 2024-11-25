<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $request->validate([
            'email_x' => 'required|email',
            'password_x' => 'required|min:8|max:30'
        ]);

        $data = [
            'email' => $request->input('email_x'),
            'password' => $request->input('password_x')
        ];

        if (Auth::attempt($data, true)) {

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

        return redirect()->route('frontend.home')->with('logout', 'You have been renting successfully');
    }


    public function  register()
    {
        return view('auth.sign-up');
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
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|string|unique:customers,phone|max:13',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('f_name') . ' ' . $request->input('l_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        Customer::create([
            'user_id' => $user->id,
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'city' => $request->input('city')
        ]);

        return redirect()->route('login')->with('email',$request->email)->with('success', 'User created successfully.');
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
