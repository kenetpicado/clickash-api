<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Company;
use App\Models\Sale;
use App\Services\CompanySaleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanySaleController extends Controller
{
    public function __construct(
        private readonly CompanySaleService $service
    ) {
        //
    }

    public function index(Request $request, Company $company)
    {
        $sale = $company->sales()
            ->with(['raffle:id,name', 'user:id,name'])
            ->when(
                ! $company->imOwner(),
                fn($query) => $query->where('user_id', auth()->id())
            )
            ->when(
                $request->hour,
                fn($query) => $query->where('hour', $request->hour)
            )
            ->when(
                $request->raffle_id,
                fn($query) => $query->where('raffle_id', $request->raffle_id)
            )
            ->latest()
            ->paginate();

        return SaleResource::collection($sale);
    }

    public function store(CompanySaleRequest $request, Company $company)
    {
        $sale = $this->service->store($request->validated(), $company);

        return SaleResource::make($sale);
    }

    public function show(Company $company, Sale $sale)
    {
        Gate::authorize('sale-show', [$sale, $company]);

        return SaleResource::make($sale->load(['raffle:id,name', 'user:id,name', 'items']));
    }

    public function destroy(Company $company, Sale $sale)
    {
        Gate::authorize('sale-delete', $sale);

        $sale->delete();

        return response()->noContent(200);
    }
}
