<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Livewire\Component;

class Charts extends Component
{
    

    public $days_ago = 7;
    
    
    public function render()
    {


        $count_car = Car::count();

        $customers = User::where('is_admin',0)->count();

        $count_car = Car::count();

        $earnings = Rental::sum('total_price');

        $now = Carbon::now();

        $three_days_ago = $now->subDays($this->days_ago);

        $earnings = Rental::where('created_at', '>=', $three_days_ago)
            ->sum('total_price');

        



        return view('livewire.charts', compact('count_car', 'earnings','customers'));
    }
}
