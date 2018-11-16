<?php

namespace App\Http\Requests;

use App\Car;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class RequestValidateCar extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        $rules = [
//            'name'=>['required','string',
//                Rule::unique('cars','name')->ignore(request()->id),
//                ],
//            'brand_id'=>'required|exists:brands,id',
//            'model'=>'required|string|max:50',
//            'seats'=>'required|integer',
//            'doors'=>'required|integer',
//            'transmission_types'=>'required|in:automatic,manual',
//            'year'=>'required|integer',
//            'engine_id'=>'required|exists:engines,id',
//            'price'=>'required',
//
//        ];


        //return $rules;
//        $car = Car::all();
        $data = request();
        return [

            'name' =>"required|string|unique:cars,name,{$data->id}",
            'brand_id'=>'required|exists:brands,id',
            'model'=>'required|string|max:50',
            'seats'=>'required|integer',
            'doors'=>'required|integer',
            'transmission_types'=>'required|in:automatic,manual',
            'year'=>'required|integer',
            'engine_id'=>'required|exists:engines,id',
            'price'=>'required|integer',
        ];
    }

    public function messages()
{
    return [
        'name.unique'=>'car name should be unique',
        'brand_id.exists' => 'you should choose brand',
        'engine_id.exists' => 'you should choose type of engines',

    ];
}
}
