<?php

namespace App\Services;

use App\Enums\PlanStatusEnum;
use App\Http\Resources\PlanResource;
use App\Models\Company;
use App\Models\Plan;

class PlanService
{
    public function buy(array $data, Plan $plan)
    {
        $company = Company::find($data['company_id']);

        if (! $company->imOwner()) {
            abort(403, 'No puedes comprar un plan para una empresa que no eres dueño');
        }

        if (! $plan->price) {
            abort(403, 'El plan gratuito se asigna por defecto');
        }

        $now = now();

        $active = $this->getActivePlan($company, $plan->id, $now);

        if ($active && $active->pivot) {
            $now = $active->pivot->expires_at;
        }

        $usersPrice = match ($plan->name) {
            'Estándar' => 9,
            'Premium' => 8,
            default => 0,
        };

        $price = $plan->price + ($data['users_limit'] * $usersPrice) * $data['months_count'];
        $discount = $plan->discount * $data['months_count'];

        $company->plans()->attach($plan->id, [
            'users_limit' => $data['users_limit'],
            'payment_method' => $data['payment_method'],
            'reference' => $data['reference'],
            'discount' => $discount,
            'price' => $price,
            'total' => $price - $discount,
            'status' => PlanStatusEnum::PENDIENTE,
            'started_at' => $now,
            'expires_at' => $now->copy()->addMonths($data['months_count']),
        ]);

        return PlanResource::make($this->getActivePlan($company, $plan->id, $now));
    }

    private function getActivePlan($company, $plan_id, $now)
    {
        return $company
            ->plans()
            ->where('plan_id', $plan_id)
            ->where('status', '!=', PlanStatusEnum::CANCELADO)
            ->where('expires_at', '>', $now)
            ->orderBy('expires_at', 'desc')
            ->first();
    }
}
