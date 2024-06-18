<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
