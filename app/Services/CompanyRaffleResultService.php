<?php

namespace App\Services;

use App\Models\Result;
use Carbon\Carbon;

class CompanyRaffleResultService
{
    public function store(array $data, $company, $raffle): void
    {
        if ($raffle->is_date) {
            try {
                Carbon::createFromFormat('d/m', $data['value']);
            } catch (\Exception $e) {
                abort(422, 'La fecha no es válida');
            }
        } else {
            if ($data['value'] < $raffle->min || $data['value'] > $raffle->max) {
                abort(422, 'El valor debe estar entre ' . $raffle->min . ' y ' . $raffle->max);
            }

            if (strlen($data['value']) !== strlen($raffle->max)) {
                abort(422, 'El valor debe tener ' . strlen($raffle->max) . ' dígitos');
            }
        }

        Result::create([
            'raffle_id' => $raffle->id,
            'company_id' => $company->id,
            'value' => $data['value'],
            'hour' => $data['hour'],
        ]);
    }

    public function destroy($company, $result): void
    {
        if ($company->user_id !== auth()->id() && $result->company_id !== $company->id) {
            abort(403, 'No puedes eliminar este resultado.');
        }

        $result->delete();
    }
}
