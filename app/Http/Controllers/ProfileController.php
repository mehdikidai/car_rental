<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{



    public function showPage()
    {




        $customer = Customer::where('user_id',auth()->user()->id)->first();

        //dd($customer->user_id);
        if (!$customer) {
           
            return abort(404);

        }
        
        
        $my_cars = Rental::with(['car' => function ($q) {
            $q->select('id', 'company_id','model_id')->with(['company' => function ($q) {
                $q->select('id', 'name');
            },'model'=>function($q){
                $q->select('id','name');
            }]);
        }])
            ->where('customer_id', '=', $customer->id)
            ->latest('created_at')
            ->paginate(4);


        $user = User::with(['customer'=>fn($q)=>$q->select('id','user_id','phone','address')])->find(1);


        if ($my_cars->currentPage() > $my_cars->lastPage()) {

           return  abort(404);

        }


        return view('frontend.profile', compact('my_cars','user'));
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
