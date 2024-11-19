<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySaleRequest;
use App\Models\Company;
use App\Models\Sale;
use App\Services\CompanySaleService;
use Illuminate\Http\Request;

class CompanySaleController extends Controller
{
    public function __construct(
        private readonly CompanySaleService $service
    ) {
        //
    }

    public function index(Request $request, Company $company)
    {
        return $company->sales()
            ->with(['raffle:id,name', 'user:id,name'])
            ->when($request->hour, fn($query) => $query->where('hour', $request->hour))
            ->latest()
            ->paginate();
    }

    public function store(CompanySaleRequest $request, Company $company)
    {
        $this->service->store($request->validated(), $company);

        return response()->noContent(200);
    }

    public function show(Company $company, Sale $sale)
    {
        return $sale->load(['raffle:id,name', 'user:id,name', 'items']);
    }

    public function destroy(Company $company, Sale $sale)
    {
        $sale->delete();

        return response()->noContent(200);
    }
}
