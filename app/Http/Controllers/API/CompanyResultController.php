<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyResultRequest;
use App\Models\Company;
use App\Models\Result;
use App\Services\CompanyRaffleResultService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyResultController extends Controller
{
    public function __construct(
        private readonly CompanyRaffleResultService $service
    ) {
        //
    }

    public function index(Request $request, Company $company)
    {
        return $company->results()
            ->with('raffle:id,name,background_color')
            ->when($request->hour, fn($query) => $query->where('hour', $request->hour))
            ->when($request->raffle_id, fn($query) => $query->where('raffle_id', $request->raffle_id))
            ->latest()
            ->paginate();
    }

    public function store(CompanyResultRequest $request, Company $company)
    {
        Gate::authorize('company-owner', $company);

        $this->service->store($request->validated(), $company);

        return response()->noContent(200);
    }

    public function destroy(Company $company, Result $result)
    {
        Gate::authorize('company-owner', $company);

        $this->service->destroy($company, $result);

        return response()->noContent(200);
    }
}
