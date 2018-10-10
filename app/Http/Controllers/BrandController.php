<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
class BrandController extends Controller
{
    public function addBrand(Request $request)
    {
        if($request->isMethod('post')){
           $data = $request->all();
           $brand = new Brand;
           $brand->name = $data['brand_name'];
           $brand->save();
           return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands added Successfully');
           //echo "<pre>"; print_r($data); die;
        }
       return view('admin.brands.add_brand');
    }

    public function editBrand(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Brand::where(['id'=>$id])->update(['name'=>$data['brand_name']]);
            return redirect('/admin/view-brands')->with('flash_massage_success', 'Brands Update Successfully');
           // echo "<pre>"; print_r($data); die;
        }
        $brandDetails = Brand::where(['id'=>$id])->first();
        return view('admin.brands.edit_brand')->with(compact('brandDetails'));
    }

    public function deleteBrand($id = null){
        if(!empty($id)){
            Brand::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_massage_success', 'Brand Delete Successfully');
        }
    }

    public function viewBrands()
    {
        $brands = Brand::get();
        return view('admin.brands.view_brands')->with(compact('brands'));
    }
}
