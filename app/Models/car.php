<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    //
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availability',
        'image'
    ];

    public function rental()
    {
        return $this->hasMany(rental::class);
    }
}
