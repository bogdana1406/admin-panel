<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engine extends Model
{
    public function car()
    {
        return $this->hasMany(Car::class);
    }
}
