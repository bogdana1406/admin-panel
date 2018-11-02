<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Brand;
use App\Engine;
use App\CarsImage;


class SearchController extends Controller
{
    public function showFilter(){
        $carDetails = Car::all();
        $carBrands = Brand::has('car')->pluck('name', 'id');
        $carEngines = Engine::has('car')->pluck('name', 'id');
        $carModels = array_unique(Car::pluck('model')->toArray());
        $carDoors = array_unique(Car::pluck('doors')->toArray());
        $carSeats = array_unique(Car::pluck('seats')->toArray());
        $carYears = array_unique(Car::pluck('year')->toArray());
        $carTransmissionTypes = array_unique(Car::pluck('transmission_types')->toArray());
        //dd($carTransmissionTypes);
        //dd($carDetails);
        return view('admin.cars.view_search_cars')->with(['carDetails'=>$carDetails, 'carModels'=>$carModels, 'carBrands'=>$carBrands, 'carEngines'=>$carEngines,
            'carDoors'=>$carDoors, 'carSeats'=>$carSeats, 'carYears'=>$carYears, 'carTransmissionTypes'=>$carTransmissionTypes]);
    }

    public function showResultFilter(Request $request, Car $car)
    {
        $data = $request->all();
//
        $car = $car->newQuery();

//
        if($request->has('brand_id') && ($data['brand_id']!="false")){
             $car->where('brand_id', $request->input('brand_id'))->get();
        }


        if($request->has('model') && ($data['model']!="false")){
             $car->where('model', $request->input('model'))->get();
        }

        if($request->has('seats') && ($data['seats']!="false")){
            $car->where('seats', $request->input('seats'))->get();
        }

        if($request->has('doors') && ($data['doors']!="false")){
            $car->where('doors', $request->input('doors'))->get();
        }

        if($request->has('transmission_types') && ($data['transmission_types']!="false")){
            $car->where('transmission_types', $request->input('transmission_types'))->get();
        }

        if($request->has('year') && ($data['year']!="false")){
            $car->where('year', $request->input('year'))->get();
        }

        if($request->has('engine_id') && ($data['engine_id']!="false")){
            $car->where('engine_id', $request->input('engine_id'))->get();
        }

//        if($request->has('price_filter')){
//            $car->where('price', '<=', $request->input('price_filter'))->get();
//        }

        $cars = $car->get();

        return view('admin.cars.view_cars')->with(compact('cars'));


        //return $car->get();


       //dd($request->has('brand_id') && ($data['brand_id']!="Select Brand"));
       //dd($request->input('price_filter'));
    }

}
