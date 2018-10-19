<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestValidateCar;
use Auth;
use Session;
use App\Brand;
use App\Engine;
use App\Car;
use Illuminate\Support\Facades\Input;
use Image;


class CarController extends Controller
{
    public function showAddCar()
    {
        $brands = Brand::pluck('name', 'id');
        $engines = Engine::pluck('name', 'id');
        //dd($brands);
        return view('admin.cars.add_car')->with(['brands'=>$brands, 'engines'=>$engines]);
    }

    public function addCar(RequestValidateCar $request)
    {
        $data = $request->except('_token');
//        $car = new Car;
//        $car->brand_id = $data['brand_id'];
//        $car->model = $data['model'];
//        $car->seats = $data['seats'];
//        $car->doors = $data['doors'];
//        $car->transmission_types = $data['transmission_types'];
//        $car->year = $data['year'];
//        $car->engine_id = $data['engine_id'];
//        $car->price = $data['price'];
//        $car->image = $data['image'] =;
//        $car->about = $data['about'];
//        $car->description = $data['description'];
//        $car->save();


          $car = Car::create($data);

        if($request->hasFile('image')){
            $image_tmp = Input::file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999).".".$extension;
                $large_image_path = 'images/backend_images/cars/large/'.$filename;
                $medium_image_path = 'images/backend_images/cars/medium/'.$filename;
                $small_image_path = 'images/backend_images/cars/small/'.$filename;

                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                $car->image = $filename;
            }
        }

            if($car){
                return redirect()->back()->with('flash_massage_success', 'Car has been added successfully');
            }else{
                return redirect()->back()->with('flash_massage_error', 'Something was wrong');
            }
       //return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands added Successfully');
        //return redirect()->back()->with('flash_massage_success', 'Product has been added successfully');
       //return redirect()->back()->with('flash_massage_success', 'Car has been added successfully');
    }


}


