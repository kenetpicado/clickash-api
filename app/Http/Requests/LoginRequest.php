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
            'username' => ['required', 'integer', 'exists:users,username', 'digits:8'],
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'username.exists' => 'El :attribute no está registrado.',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'número de teléfono',
        ];
    }
}
