<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{


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
    public function destroy(Request $request,$id)
    {


        if (!Gate::allows('isAdmin')) {

            return abort(403, 'test');

        }

        $user = User::find($request->id);

        if ($user) {

            $user->customer()->delete();

            $user->delete();

            return redirect()->back()->with('msg', 'ok');
            
        } else {

            return abort(404);
        }
    }
}
