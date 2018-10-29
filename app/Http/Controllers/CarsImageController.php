<?php

namespace App\Http\Controllers;

use App\CarsImage;
use App\Http\Requests\RequestUpload;
use App\Http\Requests\RequestUploadForm;
use Illuminate\Http\Request;
use Auth;
use Session;
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

    public function uploadSubmit(RequestUpload $request, $id=null)
    {

        $car = Car::where(['id'=>$id])->first();
        $data = [];

        if($request->hasFile('images'))
            $files = $request->file('images');
        foreach ($files as $file){
            foreach ($request->images as $image) {
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111, 99999).".".$extension;

                $filepath = $image->storeAs('files/images/cars'.$car->id, $filename);
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

//            $imageRecord = CarsImage::where(['id' => $id])->value('filename');
//            dd($imageRecord);




            CarsImage::where(['id' => $id])->delete();

            return redirect()->back()->with('flash_massage_success', 'Car Image has been delete successfully');
        }

    }



    public function uploadImagesForm()
    {
        $carDetails = Car::pluck('model', 'id');
        //dd($carDetails);
        return view('admin.images.upload_Form')->with(['carDetails'=>$carDetails]);
    }

    public function uploadFormSubmit(RequestUploadForm $request)
    {

            $data = $request->all();
            //dd($data);
            $dataCarImage = [];

            if($request->hasFile('images'))
                $files = $request->file('images');
            foreach ($files as $file){
                foreach ($request->images as $image) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111, 99999).".".$extension;

                    $filepath = $image->storeAs('files/images/cars'.$data['car_id'], $filename);
                    $dataCarImage[] = [
                        'car_id' => $data['car_id'],
                        'filename' => $filepath
                    ];
//                    CarsImage::create([
//                        'car_id' =>$data['car_id'],
//                        'filename'=>$filepath
//                    ]);
                }
                CarsImage::insert($dataCarImage);
                return redirect('/admin/view-images-table/');
            }





//        $data = $request->all();
//        //$carsImage = new CarsImage;
//        //$carsImage->car_id = $data['car_id'];
//        //dd($data['car_id']);
//
//
//        foreach($request->images as $image){
//            $filename = $image->store('images');
//            CarsImage::create([
//                'car_id' =>$data['car_id'],
//                'filename'=>$filename
//            ]);
//        }
//
//        return 'Upload successful';
    }
}


