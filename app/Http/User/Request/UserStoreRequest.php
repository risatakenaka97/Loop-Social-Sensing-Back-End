<?php

namespace App\Http\User\Request;

use App\Http\Base\Request\BaseFormRequest;

class UserStoreRequest extends BaseFormRequest {

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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'city' => 'required|string',
            'precinct' => 'required|string',
            'organization_id' => 'required|integer|gt:0',
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
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'password.confirmed' => 'Password does not match',
            'city.required' => 'City is required!',
            'precinct.required' => 'Precinct is required!',
            'organization_id.required' => 'Organization id is required!',
            'organization_id.integer' => 'Organization id should be an integer!'
        ];
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
}
