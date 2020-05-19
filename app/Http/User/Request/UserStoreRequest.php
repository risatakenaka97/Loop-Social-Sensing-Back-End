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
            'firstName' => 'string',
            'lastName' => 'string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'city' => 'string',
            'address' => 'string',
            'occupation' => 'string',
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
            'email.required' => 'Email is required!',
            'password.required' => 'Password is required!',
            'password.confirmed' => 'Password does not match',
            'password.min' => 'Password length must be greater then 6 characters',
            'organization_id.required' => 'User should be assigned to organization',
            'organization_id.gt:0' => 'organization id should be greater then 0!',
            'organization_id.integer' => 'organization id should be an integer!'
        ];
    }

    public function filters()
    {
        return [
            'firstName' => 'trim|capitalize|escape',
            'lastName' => 'trim|capitalize|escape',
            'email' => 'trim|lowercase',
            'password' => fn($value, $options = []) => str_replace(" ", "", $value),
            'city' => 'trim|capitalize|escape',
            'address' => 'trim|capitalize|escape',
            'occupation' => 'trim|capitalize|escape',
        ];
    }
}
