<?php

namespace App\Http\Requests\Blog;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreBlogFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'status' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,JPG',
        ];
    }

    public function message()
    {
        return
            [
                'title.required' => 'the title is requiered',
                'category_id.required' => 'the category is requiered',
                'description.required' => 'the description is requiered',
                'status.required' => ' status is required',
                'image.mimes' => 'this field must be image',
                'image.max' => 'the max size is 4048',
                'image.required' => 'the image is requiered',

            ];
    }
}
