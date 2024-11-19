<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySaleRequest extends FormRequest
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
            'raffle_id' => ['required', 'exists:raffles,id'],
            'hour' => ['required', 'string'],
            'client' => ['nullable', 'string'],
            'items' => ['required', 'array'],
            'items.*.value' => ['required', 'string'],
            'items.*.amount' => ['required', 'numeric'],
            'items.*.super_x' => ['required', 'boolean'],
        ];
    }
}
