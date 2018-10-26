<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUploadForm extends FormRequest
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
            'car_id' => 'required|exists:cars,id',
            'images[]' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'car_id.exists' => 'Please, choose Car',
            'images[].required' => 'Please, choose Image',

        ];
    }
}
