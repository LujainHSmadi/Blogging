<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }


    public function rules(): array
    {
        return [
            'title'  => 'required|unique:categories,title',
            'image' => 'mimes:jpeg,png,jpg,gif,JPG',
            'status'=> 'required|integer|numeric',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'The title is requierd',
            'title.unique' => 'The title must be unique',
            'image.mimes' => 'this field must be image',
            'image.max' => 'the max size is 4048',
            'status.required'=> 'the status is required',
            'status.integer'=> 'the status must be integer',
            'status.numeric'=> 'the status must be numeric',
        ];

    }
}
