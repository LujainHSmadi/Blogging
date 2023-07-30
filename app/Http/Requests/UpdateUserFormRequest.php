<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserFormRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'password' => 'confirmed',
            'role'=>'required|integer|numeric',
        ];
    }

    public function message(){
        return
        [
            'name.required' => 'the name is requiered',
            'email.required' => 'the email is requiered',
            'email.unique' => 'the email is alredy registered',
            'password.confirmed' => 'the confirmed password is not match',
            'role.required' => 'the role is requiered',

    ];
    }
}
