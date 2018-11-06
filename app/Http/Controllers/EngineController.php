<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidateEngine;
use Illuminate\Http\Request;
use App\Engine;
class EngineController extends Controller
{
    public function showAddEngine()
    {
        return view('admin.engines.add_engine');
    }

    public function addEngine(RequestValidateEngine $request)
    {
        $data = $request->all();
        $engine = new Engine;
        $engine->name = $data['engine_name'];
        $engine->save();
        return redirect('/admin/view-engines')->with('flash_massage_success', 'Engine added Successfully');
    }

    public function showEditEngine($id)
    {
        $engineDetails = Engine::where(['id'=>$id])->first();
        return view('admin.engines.edit_engine')->with(compact('engineDetails'));
    }

    public function editEngine(RequestValidateEngine $request, $id = null)
    {
        $data = $request->all();
        Engine::where(['id'=>$id])->update(['name'=>$data['engine_name']]);
        return redirect('/admin/view-engines')->with('flash_massage_success', 'Engine Update Successfully');
    }
//    public function editEngine(Request $request, $id = null)
//    {
//        if($request->isMethod('post'))
//        {
//            $data = $request->all();
//            Engine::where(['id'=>$id])->update(['name'=>$data['engine_name']]);
//            return redirect('/admin/view-engines')->with('flash_massage_success', 'Engine Update Successfully');
//            // echo "<pre>"; print_r($data); die;
//        }
//        $engineDetails = Engine::where(['id'=>$id])->first();
//        return view('admin.engines.edit_engine')->with(compact('engineDetails'));
//    }

    public function deleteEngine($id = null){
        if(!empty($id)) {
            $engineUsed = Engine::where(['id' => $id])->has('car')->get()->toArray();
            if (empty($engineUsed)) {
                Engine::where(['id' => $id])->delete();
                return redirect()->back()->with('flash_massage_success', 'Engine Delete Successfully');
            } else {
                return redirect()->back()->with('flash_massage_error', 'This Engine use in Cars table');
            }
        }
    }

    public function viewEngines()
    {
        $engines = Engine::get();
        return view('admin.engines.view_engines')->with(compact('engines'));
    }
}
