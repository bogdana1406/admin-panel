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

                $data['image'] = $filename;
            }
        }
        $car = Car::create($data);


        if($car){
                return redirect('/admin/view-cars')->with('flash_massage_success', 'Car has been added successfully');
            }else{
                return redirect()->back()->with('flash_massage_error', 'Something was wrong');
                }
            }


        public function showEditCar($id)
        {
            $brands = Brand::pluck('name', 'id');
            $engines = Engine::pluck('name', 'id');
            $carDetails = Car::where(['id'=>$id])->first();
            return view('admin.cars.edit_car')->with(['carDetails'=>$carDetails,'brands'=>$brands, 'engines'=>$engines]);
        }

        public function editCar(RequestValidateCar $request, $id = null)
        {
            $data = $request->all();
           //dd($data);

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

                    //$data['image'] = $filename;
                }
            }else{
                $filename = $data['current_image'];
            }


            Car::where(['id'=>$id])->update(['model'=>$data['model'],'brand_id'=>$data['brand_id'],
                'seats'=>$data['seats'],'doors'=>$data['doors'],'transmission_types'=>$data['transmission_types'],
                'year'=>$data['year'],'engine_id'=>$data['engine_id'],'price'=>$data['price'],'about'=>$data['about'],
                'description'=>$data['description'],'image'=>$filename]);
            //return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands Update Successfully');
            return redirect('/admin/view-cars')->with('flash_massage_success', 'Brands Update Successfully');
        }

        public function viewCars()
        {
            $cars = Car::all();
            return view('admin.cars.view_cars')->with(compact('cars'));
        }

        public function deleteCarImage($id = null)
        {
          Car::where(['id'=>$id])->update(['image'=>null]);
          return redirect()->back()->with('flash_massage_success', 'Car Image has been delete successfully');
        }

        public function deleteCar($id = null)
        {
            if (!empty($id)) {
                Car::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_massage_success', 'Car has been delete successfully');
            }

        }


//    public function deleteCar($id = null)
//    {
//            Car::where(['id' => $id])->delete();
//            return redirect()->back()->with('flash_massage_success', 'Car has been delete successfully');
//        }

}


