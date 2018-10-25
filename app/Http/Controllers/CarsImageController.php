<?php

namespace App\Http\Controllers;

use App\CarsImage;
use App\Http\Requests\UploadRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RequestValidateCar;
use Auth;
use Session;
use App\Brand;
use App\Engine;
use App\Car;
use Illuminate\Support\Facades\Input;
use Image;


class CarsImageController extends Controller
{
    public function uploadForm($id=null)
    {
        $carDetails = Car::where(['id'=>$id])->first();
        return view('admin.images.upload_Form')->with(['carDetails'=>$carDetails]);
    }

    public function uploadSubmit(Request $request, $id=null)
    {

        $car = Car::where(['id'=>$id])->first();
        $data = [];

        if($request->hasFile('images'))
            $files = $request->file('images');
        foreach ($files as $file){
            foreach ($request->images as $image) {
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111, 99999).".".$extension;

                $filepath = $image->storeAs('public/images/cars'.$car->id, $filename);
                $data[] = [
                    'car_id' => $car->id,
                    'filename' => $filepath
                ];
            }
            // dd($data);
            CarsImage::insert($data);
            return redirect('/admin/view-images-table/');
        }

    }

    public function showImagesTable()
    {
        $carsImages = CarsImage::all();
        return view('admin.images.view_images_table')->with(compact('carsImages'));
    }

    public function deleteCarsImageRecord($id = null)
    {
        if (!empty($id)) {
            CarsImage::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_massage_success', 'Car Image has been delete successfully');
        }

    }
}


