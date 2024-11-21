<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleItemResource;
use App\Models\Company;
use App\Models\SaleItem;
use Illuminate\Http\Request;

class CompanyWinnerController extends Controller
{
    public function __invoke(Request $request, Company $company)
    {
        $data = SaleItem::query()
            ->whereHas(
                'sale',
                fn ($query) => $query
                    ->where('company_id', $company->id)
                    ->when(
                        $request->raffle_id,
                        fn ($query) => $query->where('raffle_id', $request->raffle_id)
                    )
                    ->when(
                        $request->hour,
                        fn ($query) => $query->where('hour', $request->hour)
                    )
            )
            ->where('status', '!=', 'VENDIDO')
            ->with('sale')
            ->latest()
            ->paginate();

        return SaleItemResource::collection($data);
    }
}
