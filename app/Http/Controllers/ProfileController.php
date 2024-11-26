<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{



    public function showPage()
    {




        $customer = Customer::where('user_id', auth()->user()->id)->first();

        //dd($customer->user_id);
        if (!$customer) {

            return abort(404);

        }


        $my_cars = Rental::with([
            'car' => function ($q) {
                $q->select('id', 'company_id', 'model_id')->with([
                    'company' => function ($q) {
                        $q->select('id', 'name');
                    },
                    'model' => function ($q) {
                        $q->select('id', 'name');
                    }
                ]);
            }
        ])
            ->where('customer_id', '=', $customer->id)
            ->latest('created_at')
            ->paginate(4);


        $user = User::with(['customer' => fn($q) => $q->select('id', 'user_id', 'phone', 'address')])->find(auth()->user()->id);


        if ($my_cars->currentPage() > $my_cars->lastPage()) {

            return abort(404);

        }


        return view('frontend.profile', compact('my_cars', 'user'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit()
    {
        $user = Auth::user();

        $customer = Customer::findOrFail($user->id);

        //dd($user);
        return view('frontend.profile-update', compact('user', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $user = $request->user();

        $data = $this->validateUpdateData($request, $user);

        $user->update([
            'name' => $data['f_name'] . ' ' . $data['l_name'],
            'email' => $data['email'],
            'password' => isset($data['password']) ? Hash::make($data['password']) : $user->password,
        ]);

        if ($user->customer) {
            $user->customer->update([
                'address' => $data['address'],
                'city' => $data['city'],
                'phone' => $data['phone'],
            ]);
        }

        $user->save();

        return redirect()->route('profile.show-page')->with('ok', 'updated successfully');

    }


    private function validateUpdateData(Request $request, $user)
    {
        return $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user->id)],
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => [
                'required',
                'string',
                'max:13',
                Rule::unique('customers', 'phone')->ignore(optional($user->customer)->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    }
}
