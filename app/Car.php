<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'brand_id', 'model', 'seats', 'doors', 'transmission_types', 'year', 'engine_id', 'price', 'image', 'about', 'description'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function engine()
    {
        return $this->belongsTo(Engine::class);
    }

    public function carsImage()
    {
        return $this->hasMany(CarsImage::class);
    }
}
