<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyPlanRequest extends FormRequest
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
            'company_id' => ['required', 'exists:companies,id'],
            'users_limit' => ['required', 'integer', 'min:0'],
            'payment_method' => ['required', 'string'],
            'reference' => ['required', 'string'],
            'months_count' => ['required', 'integer', 'min:1'],
        ];
    }
}
