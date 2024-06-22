<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function show(Request $request)
    {

        $data = $request->validate([

            'company_id' => 'nullable|integer|exists:companies,id',
            'start_date' => ['required', 'date_format:Y-m-d', 'before_or_equal:end_date'],
            'end_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:start_date'],

        ]);


        $company_id = $request->input('company_id');
        $newStartDate = $request->start_date;
        $newEndDate = Carbon::parse($request->end_date)->endOfDay();

        $q = Car::query();

        if ($company_id !== null) {

            $q->where('company_id', $company_id);

        }


        $cars = $q->whereDoesntHave('rentals', function ($query) use ($newStartDate, $newEndDate) {
            $query->where(function ($query) use ($newStartDate, $newEndDate) {
                $query->whereBetween('rental_date', [$newStartDate, $newEndDate])
                    ->orWhereBetween('return_date', [$newStartDate, $newEndDate])
                    ->orWhere(function ($query) use ($newStartDate, $newEndDate) {
                        $query->where('rental_date', '<=', $newStartDate)
                            ->where('return_date', '>=', $newEndDate);
                    });
            });
        })
            ->with(['rentals' => function ($query) {
                $query->select('id', 'car_id', 'rental_date', 'return_date');
            }])
            ->latest('id')
            ->paginate(12);





        //return response()->json($cars);

        //$cars = Car::where('company_id', $company_id)->get();
        //$cars = Car::where('company_id', $company_id)->get();

        //dd($cars);

        return view('frontend.search', compact('cars'));
    }
}
