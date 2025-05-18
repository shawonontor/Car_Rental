<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rental extends Model
{
    //
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost',
    ];

    public function usertable()
    {
        return $this->belongsTo(User::class);
    }
    public function cartable()
    {
        return $this->belongsTo(car::class);
    }
}


