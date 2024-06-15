<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class Cars extends Component
{
    
    use WithPagination;

    public $year = 2023;
    public $start_price;
    public $end_price;
    
    
    public function render()
    {

        $cars = Car::orderBy('id', 'DESC')->paginate(9);
        $years = Car::select('year')->distinct()->get();
        return view('livewire.cars', compact('cars','years'));

    }
}
