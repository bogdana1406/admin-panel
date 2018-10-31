<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use App\Engine;


class SearchController extends Controller
{
    public function showFilter(){
        $carDetails = Car::all();
        $carBrands = Brand::has('car')->pluck('name', 'id');
        $carEngines = Engine::has('car')->pluck('name', 'id');
        $carDoors = array_unique(Car::pluck('doors')->toArray());
        $carSeats = array_unique(Car::pluck('seats')->toArray());
        $carYears = array_unique(Car::pluck('year')->toArray());
        $carTransmissionTypes = array_unique(Car::pluck('transmission_types')->toArray());
        //dd($carTransmissionTypes);
        //dd($carBrands);
        //dd($carDetails);
        return view('admin.cars.view_search_cars')->with(['carDetails'=>$carDetails, 'carBrands'=>$carBrands, 'carEngines'=>$carEngines,
            'carDoors'=>$carDoors, 'carSeats'=>$carSeats, 'carYears'=>$carYears, 'carTransmissionTypes'=>$carTransmissionTypes]);
    }

    public function showResultFilter(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

}
