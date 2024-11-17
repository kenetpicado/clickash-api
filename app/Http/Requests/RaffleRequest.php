<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RaffleRequest extends FormRequest
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
            'name' => ['required'],
            'background_color' => ['required', 'regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
            'description' => ['nullable'],
            'is_date' => ['boolean'],
            'min' => ['required_unless:is_date,true'],
            'max' => ['required_unless:is_date,true'],
            'individual_limit' => ['nullable'],
            'general_limit' => ['nullable'],
            'multiplier' => ['required'],
            'schedule' => ['required', 'array'],
            'schedule.*.day_number' => ['required', 'integer', 'min:0', 'max:6'],
            'schedule.*.day' => ['required', 'in:D,L,M,X,J,V,S'],
            'schedule.*.hours' => ['nullable', 'array'],
            'schedule.*.hours.*' => ['required', 'date_format:H:i'],
        ];
    }

    public function messages(): array
    {
        return [
            'background_color.regex' => 'El color de fondo debe ser un color hexadecimal válido.',
            'min.required_unless' => 'El campo mínimo es requerido si el sorteo no es de fecha.',
            'max.required_unless' => 'El campo máximo es requerido si el sorteo no es de fecha.',
            'schedule.required' => 'El horario es requerido.',
        ];
    }
}
