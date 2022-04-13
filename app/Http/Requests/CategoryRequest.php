<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        if(isset($this->urlKey)) {
            $category = Category::where('url_key', $this->urlKey)->first();
        }
        return [
            'name' => ['required', 'max:255', Rule::unique('categories', 'name')->ignore(isset($category->id) ? $category->id : '')],
            'description' => 'required',
        ];
    }
}
