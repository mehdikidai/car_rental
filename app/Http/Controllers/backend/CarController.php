<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Company;
use App\Models\ModelCar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CarRequest;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{



    public function __construct()
    {  

    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $today = Carbon::now()->toDateString();

        $cars = Car::with(['model' => function ($query) {

            $query->select('id', 'name', 'company_id')->with(['company' => function ($q) {

                $q->select('id', 'name',);
            }]);
        }, 'rentals' => function ($q)   use ($today) {

            $q->select('id', 'car_id', 'rental_date', 'return_date')

                ->where(function ($q) use ($today) {

                    $q->whereDate('rental_date', '<=', $today)
                        ->whereDate('return_date', '>=', $today);
                });
        }])->latest('id')->paginate(10);

        //return response()->json($cars);

        return view('backend.cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $company = Company::all();

        return view('backend.car-create', compact('company'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarRequest $request)
    {

        $validatedData = $request->validated();

        Gate::authorize('isAdmin');

        $n_mode = ModelCar::create([
            'company_id' => $validatedData['company_id'],
            'name' => $validatedData['model_name']
        ]);


        if ($request->hasFile('photo')) {

            $fileName = Str::uuid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $validatedData['photo'] = $fileName;
        }

        $car = new Car();
        $car->company_id = $validatedData['company_id'];
        $car->model_id = $n_mode->id;
        $car->year = $validatedData['year'];
        $car->rental_price = $validatedData['rental_price'];
        $car->description = $validatedData['description'];
        $car->photo = $validatedData['photo'];
        $car->doors = $validatedData['doors'];
        $car->transmission = $validatedData['transmission'];
        $car->save();

        return redirect()->route('backend.cars')->with('success', 'Car created successfully.');
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

        $company = Company::all();

        $car = Car::findOrFail($id);



        return view('backend.car-edit', compact('company', 'car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'model_name' => 'required|string',
            'year' => 'required|integer',
            'rental_price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'doors' => 'required|integer',
            'transmission' => 'required|string|in:manual,auto',
        ]);


        Gate::authorize('isAdmin');


        $car = Car::findOrFail($id);

        $modelCar = ModelCar::findOrFail($car->model_id);

        $modelCar->update([
            'company_id' => $validatedData['company_id'],
            'name' => $validatedData['model_name']
        ]);

        if ($request->hasFile('photo')) {

            if ($car->photo && file_exists(public_path('uploads/' . $car->photo))) {
                unlink(public_path('uploads/' . $car->photo));
            }

            $fileName = Str::uuid() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads'), $fileName);
            $validatedData['photo'] = $fileName;
        } else {

            $validatedData['photo'] = $car->photo;
        }

        $car->update([
            'company_id' => $validatedData['company_id'],
            'model_id' => $modelCar->id,
            'year' => $validatedData['year'],
            'rental_price' => $validatedData['rental_price'],
            'description' => $validatedData['description'],
            'photo' => $validatedData['photo'],
            'doors' => $validatedData['doors'],
            'transmission' => $validatedData['transmission'],
        ]);


        return redirect()->route('backend.cars')->with('success', 'Car updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Gate::authorize('isAdmin');

        try {

            $car = Car::findOrFail($id);

            $photoPath = public_path('uploads') . '/' . $car->photo;

            $res = $car->delete();

            if ($res) {

                if (File::exists($photoPath)  &&   $car->photo != 'default.webp') { 

                    File::delete($photoPath);
                    
                }

                return back()->with('success', 'car deleted successfully');
            }

            abort(403);

        } catch (Exception $e) {

            return abort(500, $e->getMessage());

        }
    }
}
