<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Company;
use App\Models\ModelCar;
use App\Models\Rental;

class Car extends Model
{
    use HasFactory;


    protected $fillable = [

        'company_id',
        'model_id',
        'year',
        'rental_price',
        'description',
        'photo',
        'doors',
        'transmission',
        
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(ModelCar::class, 'model_id');
    }

    public function rentals(): HasMany
    {
        
        return $this->hasMany(Rental::class,'car_id');

    }
}
