<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarsImage extends Model
{
    protected $fillable = ['car_id', 'filename'];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
