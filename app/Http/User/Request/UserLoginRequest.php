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
            'organization_id' => 'required|integer',
            'name' => 'required|string',
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
            'organization_id.required' => 'Organization id is required!',
            'organization_id.integer' => 'Organization id should be an integer!',
            'name.required' => 'Name is required!',
            'password.required' => 'Password is required!',
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
