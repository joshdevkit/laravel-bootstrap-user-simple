<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ];
    }


    public function messages()
    {
        return [
            'email.required' => "Email cannot be empty",
            'email.exists' => "The provided credentials doesn't match to our record.",
            'password.required' => "Password cannot be empty",
        ];
    }
}
