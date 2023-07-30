<?php

namespace App\Http\Requests\Category;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=> 'required|unique:categories,title,'.$this->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif',
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
