<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class Rental extends Model
{
    
    use HasFactory;


    protected $fillable = [
        'car_id',
        'customer_id',
        'rental_date',
        'return_date',
        'total_price',
        'days'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
