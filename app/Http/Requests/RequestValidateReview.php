<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidateReview extends FormRequest
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
            'customer_name' => 'required|min:3',
            'published_at' => 'required',
            'text_review' => 'required',
            'customer_link' => 'required',
            //'customer_photo' => 'required',
            'mark_review' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
