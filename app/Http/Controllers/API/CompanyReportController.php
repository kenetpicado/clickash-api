<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyReportRequest;
use App\Models\Company;
use App\Models\SaleItem;

class CompanyReportController extends Controller
{
    public function __invoke(CompanyReportRequest $request, Company $company)
    {
        return SaleItem::query()
            ->whereHas(
                'sale',
                fn ($query) => $query
                    ->where('raffle_id', $request->raffle_id)
                    ->where('company_id', $company->id)
                    ->when(
                        $request->hour,
                        fn ($query) => $query->where('hour', $request->hour)
                    )
                    ->when(
                        $request->date,
                        fn ($query) => $query->whereDate('sales.created_at', $request->date)
                    )
                    ->when(
                        $request->user_id,
                        fn ($query) => $query->where('user_id', $request->user_id)
                    )
            )
            ->selectRaw('value, sum(total) as total')
            ->groupBy('value')
            ->orderBy('value')
            ->get();
    }
}
