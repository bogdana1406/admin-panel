<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidateBrand;
use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{

    public function showAddBrand()
    {
        return view('admin.brands.add_brand');
    }

    public function AddBrand(RequestValidateBrand $request)
    {
        $data = $request->all();
          $brand = new Brand;
          $brand->name = $data['brand_name'];
          $brand->save();
          return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands added Successfully');
//           //echo "<pre>"; print_r($data); die;
    }

    public function showEditBrand($id)
    {
        $brandDetails = Brand::where(['id'=>$id])->first();
        return view('admin.brands.edit_brand')->with(compact('brandDetails'));
    }

    public function editBrand(RequestValidateBrand $request, $id = null)
    {

            $data = $request->all();
            //dd($data);
            Brand::where(['id'=>$id])->update(['name'=>$data['brand_name']]);
            return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands Update Successfully');
           //echo "<pre>"; print_r($validatedData); die;
    }

    public function deleteBrand($id = null){

        if(!empty($id)){
            $brandUsed = Brand::where(['id'=>$id])->has('car')->get()->toArray();
            if(empty($brandUsed)){
            Brand::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_massage_success', 'Brand Delete Successfully');
            }else{
                return redirect()->back()->with('flash_massage_error', 'This Brand use in Cars table');
            }
        }
    }

    public function viewBrands()
    {
        $brands = Brand::get();
        return view('admin.brands.view_brands')->with(compact('brands'));
    }
}
