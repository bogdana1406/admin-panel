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
        $carBrands = Brand::has('car')->pluck('name')->toArray();
        $carEngins = Engine::has('car')->pluck('name')->toArray();
        $carDoors = array_unique(Car::pluck('doors')->toArray());
        $carSeats = array_unique(Car::pluck('seats')->toArray());

        //dd($carEngins);
        //dd($carSeats);
        //dd($carDetails);
        return view('admin.cars.view_search_cars')->with(['carDetails'=>$carDetails, 'carBrands'=>$carBrands, 'carEngins'=>$carEngins,
            'carDoors'=>$carDoors, 'carSeats'=>$carSeats,]);
    }

    public function showResultFilter(Request $request)
    {

    }

}
