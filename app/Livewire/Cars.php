<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
{

    use WithPagination;

    public $company_id;


    public function filter($id = null)
    {

        $this->company_id = $id;
        $this->resetPage();
    }

    public function render()
    {

        //$companies  =  Company::where('id',Car::find($this->company_id))->get();
        
        $companies = Car::with('company:id,name')->get()->pluck('company')->unique();
        //dd($companies);


        $query = Car::with(['company' => function ($q) {
            $q->select('id', 'name');
        }, 'model' => function ($q) {
            $q->select('id', 'name');
        }]);

        if ($this->company_id) {
            $query->where('company_id', $this->company_id);
        }

        $cars = $query->orderBy('id', 'DESC')->paginate(12);



        return view('livewire.cars', compact('cars', 'companies'));
    }
}
