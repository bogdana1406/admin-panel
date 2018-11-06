<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidatePassword extends FormRequest
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
            'new_pwd' => 'required|min:6',
            'confirm_pwd' => 'same:new_pwd',
        ];
    }


    public function messages()
    {
        return [
            'new_pwd.min'=> 'Password has to be minimum 6 characters long',
            'confirm_pwd.same' => 'Passwords are different',

        ];
    }
}
