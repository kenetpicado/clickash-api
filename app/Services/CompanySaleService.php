<?php

namespace App\Services;

use App\Models\Raffle;
use App\Models\Sale;
use App\Models\SaleItem;

class CompanySaleService
{
    public function store(array $data, $company): void
    {
        $sale = Sale::create([
            'raffle_id' => $data['raffle_id'],
            'user_id' => auth()->id(),
            'company_id' => $company->id,
            'total' => 100,
            'hour' => $data['hour'],
            'client' => $data['client'],
        ]);

        $raffle = Raffle::find($data['raffle_id']);

        $items = collect($data['items'])->map(function ($item) use ($data) {
            $total = $item['amount'] * ($item['super_x'] ? 2 : 1);
            $multiplier = $raffle->multiplier ?? 70;

            return [
                'value' => $item['value'],
                'amount' => $item['amount'],
                'super_x' => $item['super_x'],
                'total' => $total,
                'status' => 'VENDIDO',
                'hour' => $data['hour'],
                'prize' => $total * $multiplier,
            ];
        });

        $sale->items()->createMany($items->toArray());
    }
}
