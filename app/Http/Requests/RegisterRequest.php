<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => "required|max:100",
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "Name cannot be empty",
            'name.max' => "Maximum character limit reach for the name",
            'email.required' => "Email cannot be empty",
            'email.unique' => "The email is already in used.",
            'password.required' => "Password cannot be empty",
        ];
    }
}
