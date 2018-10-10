<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Engine;
class EngineController extends Controller
{
    public function addEngine(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $engine = new Engine;
            $engine->name = $data['engine_name'];
            $engine->save();
            return redirect('/admin/view-engines')->with('flash_massage_success', 'Engine added Successfully');
            //echo "<pre>"; print_r($data); die;
        }
        return view('admin.engines.add_engine');
    }

    public function editEngine(Request $request, $id = null)
    {
        if($request->isMethod('post'))
        {
            $data = $request->all();
            Engine::where(['id'=>$id])->update(['name'=>$data['engine_name']]);
            return redirect('/admin/view-engines')->with('flash_massage_success', 'Engine Update Successfully');
            // echo "<pre>"; print_r($data); die;
        }
        $engineDetails = Engine::where(['id'=>$id])->first();
        return view('admin.engines.edit_engine')->with(compact('engineDetails'));
    }

    public function deleteEngine($id = null){
        if(!empty($id)){
            Engine::where(['id'=>$id])->delete();
            return redirect()->back()->with('flash_massage_success', 'Engine Delete Successfully');
        }
    }

    public function viewEngines()
    {
        $engines = Engine::get();
        return view('admin.engines.view_engines')->with(compact('engines'));
    }
}
