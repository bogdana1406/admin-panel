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
            'brand_id'=>'required|exists:brands,id',
            'model'=>'required',
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
        'title.required' => 'A title is required',
        'body.required'  => 'A message is required',
    ];
}
}
