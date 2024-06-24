<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use  App\Models\ModelCar;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo'
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(ModelCar::class, 'model_id');
    }
}
