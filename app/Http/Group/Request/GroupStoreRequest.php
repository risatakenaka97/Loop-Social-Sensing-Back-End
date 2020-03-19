<?php

namespace App\Http\Group\Request;

use App\Http\Base\Request\BaseFormRequest;

class GroupStoreRequest extends BaseFormRequest {

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
            'name' => 'required|string|unique:groups',
            'user_id' => 'required|integer',
            'website' => 'required|string',
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
            'user_id.required' => 'Group administrator is required!',
            'website.required' => 'Website is required!',
        ];
    }

    public function filters()
    {
        return [
            'name' => 'trim|capitalize|escape',
            'website' => 'trim|escape|lowercase',

        ];
    }
}
