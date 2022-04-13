<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'content' => 'required',
            'short_description' => 'required',
            'thumbnail' => 'mimes:jpeg,jpg,png,gif|max:100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please enter post title',
            'content.required' => 'Please enter content',
            'short_description.required' => 'Please enter short description',
            'thumbnail.max' => 'Image too large',
            'thumbnail.mimes' => 'File Type must be in jpeg,jpg,png,gif',
        ];
    }
}
