<?php

namespace App\Http\Feedback\Request;

use App\Http\Base\Request\BaseFormRequest;

class FeedbackStoreRequest extends BaseFormRequest {

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
            'type' => 'required|string|in:POLICY,COMMUNITY_INITIATIVES,GENERAL',
            'feeling' => 'required|string|in:NEGATIVE,NEUTRAL,POSITIVE',
            'comment' => 'required|string|max:255',
            'publicity' => 'required|boolean',
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
            'type.required' => 'Type is required',
            'type.string' => 'Type must be of type string',
            'type.in' => 'Type must be one of Policy, Community Initiatives or General',
            'feeling.required' => 'Feeling is required',
            'feeling.string' => 'Feeling must be of type string',
            'feeling.in' => 'Feeling must be one of Sad, Good or Happy',
            'comment.required' => 'Comment is required',
            'comment.string' => 'Comment must be of type string',
            'comment.max' => 'Comment length must be less then 255 characters long',
            'publicity.required' => 'Publicity is required',
            'publicity.boolean' => 'Publicity must be boolean'
        ];
    }

    public function filters()
    {
        return [
            'type' => 'trim|uppercase|escape',
            'feeling' => 'trim|uppercase|escape',
            'comment' => 'trim|escape',
        ];
    }
}
