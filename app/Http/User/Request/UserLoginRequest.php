<?php

namespace App\Http\User\Request;

use App\Http\Base\Request\BaseFormRequest;

class UserLoginRequest extends BaseFormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
        ];
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'password' => 'trim|escape'
        ];
    }
}
