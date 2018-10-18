<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function Car()
    {
        return $this->hasMany(Car::class);
    }
}
