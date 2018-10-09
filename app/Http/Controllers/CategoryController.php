<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(Request $request)
    {
        if($request->isMethod('post')){
         $data = $request->all();
         //echo "<pre>"; print_r($data); die;
            $category = new Category;
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/view-categories')->with('flash_massage_success', 'Category added Successfully');
        }
        return view('admin.categories.add_category');
    }

    public function editCategory(Request $request, $id = null)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            Category::where(['id'=>$id])->update(['name'=>$data['category_name'], 'description'=>$data['description'], 'url'=>$data['url']]);
            return redirect('/admin/view-categories')->with('flash_massage_success', 'Category updated Successfully');
        }
        $categoryDetails = Category::where(['id'=>$id])->first();
        return view('admin.categories.edit_category')->with(compact('categoryDetails'));
    }

    public function deleteCategory($id = null)
    {
        if(!empty($id)){
            Category::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_massage_success', 'Category deleted Successfully');
        }
    }

    public function viewCategories()
    {
        $categories = Category::get();

       return view('admin.categories.view_categories')->with(compact('categories'));
    }
}
