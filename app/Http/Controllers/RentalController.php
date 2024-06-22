<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;

class RentalController extends Controller
{
    public  function store(Request $request)
    {

        $data = $request->validate([

            'car_id' => 'required|integer|exists:cars,id',
            'rental_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:return_date'],
            'return_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:rental_date'],

        ]);

        $rental_date   = Carbon::parse($data['rental_date']);
        $return_date   = Carbon::parse($data['return_date']);

        $allDays = $rental_date->diffInDays($return_date);
        $car     = Car::findOrFail($data['car_id']);
        $total_price = $car->rental_price * $allDays;

        $customer_id =  Auth::user()->customer->id;


        $overlappingRentals = Rental::where('car_id', $request->input('car_id'))
            ->where(function ($query) use ($rental_date, $return_date) {
                $query->whereBetween('rental_date', [$rental_date, $return_date])
                    ->orWhereBetween('return_date', [$rental_date, $return_date])
                    ->orWhereRaw('? BETWEEN rental_date AND return_date', [$rental_date])
                    ->orWhereRaw('? BETWEEN rental_date AND return_date', [$return_date]);
            })
            ->exists();

        if ($overlappingRentals) {

            return back()->with('error_rental', 'You have been renting successfully');
        }

        Rental::create([

            'car_id' => $data['car_id'],
            'customer_id' => $customer_id,
            'rental_date' => $rental_date,
            'return_date' => $return_date,
            'total_price' => $total_price,
            'days' => $allDays

        ]);

        return redirect()->route('profile.show-page')->with('ok', 'You have been renting successfully');
    }


    // getBookedDays ----------------------

    public function getBookedDays(Request $request)
    {

        $rentals = Rental::where('car_id', $request->car_id)->get();
        $bookedDays = [];

        foreach ($rentals as $rental) {
            $start = Carbon::parse($rental->rental_date);
            $end = Carbon::parse($rental->return_date);

            while ($start->lte($end)) {
                $bookedDays[] = $start->toDateString();
                $start->addDay();
            }
        }

        return response()->json(['booked_days' => $bookedDays], 200);
    }

    public function destroy(Request $request)
    {


        $id = $request->id;
        $rental = Rental::find($id);

        if (!Gate::allows('del', $rental)) {


            abort(403);

        }

        $isOk = $rental->delete();

        if (!$isOk) {

            return back()->with('error', 'error');
        }

        return back()->with('success', 'Car deleted successfully');
    }
}
