<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{

    public function destroy(Request $request): RedirectResponse
    {
        try {

            Gate::authorize('isAdmin');

            $user = User::findOrFail($request->id);

            $user->customer()->delete();

            $user->delete();

            return redirect()->back()->with('msg', 'User deleted successfully.');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'An error occurred while deleting the user.']);

        }

    }
}
