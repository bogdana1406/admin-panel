<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function addCar(Request $request)
    {
        return view('admin.cars.add_car');
    }
}
