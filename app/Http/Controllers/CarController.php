<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestValidateCar;
use Auth;
use Session;
use App\Brand;
use App\Engine;
use App\Car;

class CarController extends Controller
{
    public function showAddCar(Request $request)
    {
        $brands = Brand::pluck('name', 'id');
        $engines = Engine::pluck('name', 'id');
        //dd($brands);
        return view('admin.cars.add_car')->with(['brands'=>$brands, 'engines'=>$engines]);
    }

    public function addCar(RequestValidateCar $request)
    {
        $data = $request->all();
        $car = new Car;
        $car->brand_id = $data['brand_id'];
        $car->model = $data['model'];
        $car->seats = $data['seats'];
        $car->doors = $data['doors'];
        $car->transmission_types = $data['transmission_type'];
        $car->year = $data['year'];
        $car->engine_id = $data['engine_id'];
        $car->price = $data['price'];
        $car->image = $data['image'];
        $car->about = $data['about'];
        $car->description = $data['description'];
        $car->save();
        return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands added Successfully');
    }


}


