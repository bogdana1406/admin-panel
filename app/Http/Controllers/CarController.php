<?php

namespace App\Http\Controllers;

use App\CarsImage;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Storage;
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

        $small_h = ($data['small_h'] && ($data['small_h']>0)) ? (int)$data['small_h']:300;
        $small_w = ($data['small_w'] && ($data['small_w']>0)) ? (int)$data['small_w']:300;
        $medium_h = ($data['medium_h'] && ($data['medium_h']>0)) ? (int)$data['medium_h']:600;
        $medium_w = ($data['medium_w'] && ($data['medium_w']>0)) ? (int)$data['medium_w']:600;
       // dd($small_h, $small_w, $medium_h, $medium_w);

        if($request->hasFile('image')){
            $image_tmp = Input::file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = rand(111, 99999).".".$extension;
                $large_image_path = 'images/backend_images/cars/large/'.$filename;
                $small_image_path = 'images/backend_images/cars/small/'.$filename;
                $medium_image_path = 'images/backend_images/cars/medium/'.$filename;

                Image::make($image_tmp)->save($large_image_path);
                Image::make($image_tmp)->resize($small_w, $small_h)->save($small_image_path);
                //$small_ww = Image::make($small_image_path)->width();
                //$small_hh = Image::make($small_image_path)->height();

                Image::make($image_tmp)->resize($medium_w, $medium_h)->save($medium_image_path);
                //$medium_ww = Image::make($medium_image_path)->width();
                //$medium_hh = Image::make($medium_image_path)->height();

               // dd($small_ww, $small_hh, $medium_ww, $medium_hh);
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
            //dd(Car::where(['id'=>$id])->first());
            return view('admin.cars.edit_car')->with(['carDetails'=>$carDetails,'brands'=>$brands, 'engines'=>$engines]);
        }

        public function editCar(RequestValidateCar $request, $id = null)
        {
            $data = $request->all();
           //dd($data);
            $car = Car::find($id);
            $old_image = $car->image;

            //dd($old_image);
            $medium_h = ($data['medium_h'] && ($data['medium_h']>0)) ? (int)$data['medium_h']:600;
            $medium_w = ($data['medium_w'] && ($data['medium_w']>0)) ? (int)$data['medium_w']:600;
            $small_h = ($data['small_h'] && ($data['small_h']>0)) ? (int)$data['small_h']:300;
            $small_w = ($data['small_w'] && ($data['small_w']>0)) ? (int)$data['small_w']:300;


//            if($old_image){
//                $existsMedium = Storage::disk('public')->exists('images/backend_images/cars/medium/'.$old_image);
//                if($existsMedium){
//                    $medium_w = Image::make('images/backend_images/cars/medium/'.$old_image)->width();
//                    //dd($medium_w, Image::make('images/backend_images/cars/medium/'.$old_image));
//                    $medium_h = Image::make('images/backend_images/cars/medium/'.$old_image)->height();
//                }else {
//                    $medium_h = ($data['medium_h'] && ($data['medium_h']>0)) ? (int)$data['medium_h']:600;
//                    $medium_w = ($data['medium_w'] && ($data['medium_w']>0)) ? (int)$data['medium_w']:600;
//                }
//            } else {
//            $medium_h = ($data['medium_h'] && ($data['medium_h']>0)) ? (int)$data['medium_h']:600;
//            $medium_w = ($data['medium_w'] && ($data['medium_w']>0)) ? (int)$data['medium_w']:600;
//            }
//            if($old_image){
//                $existsSmall = Storage::disk('public')->exists('images/backend_images/cars/small/'.$old_image);
//                if($existsSmall){
//                    $small_w = Image::make('images/backend_images/cars/small/'.$old_image)->width();
//                    //dd($medium_w, Image::make('images/backend_images/cars/medium/'.$old_image));
//                    $small_h = Image::make('images/backend_images/cars/small/'.$old_image)->height();
//                }else {
//                    $small_h = ($data['small_h'] && ($data['small_h']>0)) ? (int)$data['small_h']:300;
//                    $small_w = ($data['small_w'] && ($data['small_w']>0)) ? (int)$data['small_w']:300;
//                }
//            } else {
//                $small_h = ($data['small_h'] && ($data['small_h']>0)) ? (int)$data['small_h']:300;
//                $small_w = ($data['small_w'] && ($data['small_w']>0)) ? (int)$data['small_w']:300;
//            }

            //dd($medium_h, $medium_w, $small_h, $small_w);


            if($request->hasFile('image')){
                if($old_image){
                    $existsMedium = Storage::disk('public')->exists('images/backend_images/cars/medium/'.$old_image);
                    if($existsMedium){
                            Storage::disk('public')->delete('images/backend_images/cars/medium/'.$old_image);
                    }
                }
                if($old_image){
                    $existsSmall = Storage::disk('public')->exists('images/backend_images/cars/small/'.$old_image);
                    if($existsSmall){
                        Storage::disk('public')->delete('images/backend_images/cars/small/'.$old_image);
                    }
                }
                if($old_image){
                    $existsLarge = Storage::disk('public')->exists('images/backend_images/cars/large/'.$old_image);
                    if($existsLarge){
                        Storage::disk('public')->delete('images/backend_images/cars/large/'.$old_image);
                    }
                }
                $image_tmp = Input::file('image');
                //dd($image_tmp);
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111, 99999).".".$extension;
                    //dd($filename);
                    $large_image_path = 'images/backend_images/cars/large/'.$filename;
                    $medium_image_path = 'images/backend_images/cars/medium/'.$filename;
                    $small_image_path = 'images/backend_images/cars/small/'.$filename;

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize($medium_w,$medium_h)->save($medium_image_path);
                    Image::make($image_tmp)->resize($small_w,$small_h)->save($small_image_path);

                    //$data['image'] = $filename;
                }
            }else{
                $filename = $data['current_image'];
            }

            Car::where(['id'=>$id])->update(['name'=>$data['name'],'model'=>$data['model'],'brand_id'=>$data['brand_id'],
                'seats'=>$data['seats'],'doors'=>$data['doors'],'transmission_types'=>$data['transmission_types'],
                'year'=>$data['year'],'engine_id'=>$data['engine_id'],'price'=>$data['price'],'about'=>$data['about'],
                'description'=>$data['description'],'image'=>$filename]);

            //return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands Update Successfully');
            return redirect('/admin/view-cars')->with('flash_massage_success', 'Car Update Successfully');
        }

        public function viewCars()
        {
            $cars = Car::all();
            return view('admin.cars.view_cars')->with(compact('cars'));
        }

        public function deleteCarImage($id = null)
        {

            $car = Car::find($id);
            $filename = $car->image;
            $existsLarge = Storage::disk('public')->exists('images/backend_images/cars/large/'.$filename);
            if($existsLarge){
               Storage::disk('public')->delete('images/backend_images/cars/large/'.$filename);
            }
            $existsMedium = Storage::disk('public')->exists('images/backend_images/cars/medium/'.$filename);
            if($existsMedium){
                Storage::disk('public')->delete('images/backend_images/cars/medium/'.$filename);
            }
            $existsSmall = Storage::disk('public')->exists('images/backend_images/cars/small/'.$filename);
            if($existsSmall){
                Storage::disk('public')->delete('images/backend_images/cars/small/'.$filename);
            }

            //die;

         $car->update(['image'=>null]);
          return redirect()->back()->with('flash_massage_success', 'Car Image has been delete successfully');
        }

        public function deleteCar($id = null)
        {

             $car = Car::find($id);

             $filename = $car->image;
             $existsLarge = Storage::disk('public')->exists('images/backend_images/cars/large/'.$filename);
             if($existsLarge){
                Storage::disk('public')->delete('images/backend_images/cars/large/'.$filename);
             }
             $existsMedium = Storage::disk('public')->exists('images/backend_images/cars/medium/'.$filename);
             if($existsMedium){
                Storage::disk('public')->delete('images/backend_images/cars/medium/'.$filename);
             }
             $existsSmall = Storage::disk('public')->exists('images/backend_images/cars/small/'.$filename);
             if($existsSmall){
                Storage::disk('public')->delete('images/backend_images/cars/small/'.$filename);
             }

                if($car) {
                    $carsImageRecords = $car->carsImage()->pluck('filename')->toArray();
                    $deleteImg = Storage::delete($carsImageRecords);
                        $car->carsImage()->delete();
                        $car->delete();


                }

//                Car::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_massage_success', 'Car has been delete successfully');
             }





}


