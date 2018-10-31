<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'name' => 'required|unique:cars,name|string',
            'brand_id'=>'required|exists:brands,id',
            'model'=>'required|string|max:50',
            'seats'=>'required|integer',
            'doors'=>'required|integer',
            'transmission_types'=>'required|in:automatic,manual',
            'year'=>'required|integer',
            'engine_id'=>'required|exists:engines,id',
            'price'=>'required',
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
