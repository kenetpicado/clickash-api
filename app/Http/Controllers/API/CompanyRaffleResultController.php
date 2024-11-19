<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRaffleResultRequest;
use App\Models\Company;
use App\Models\Raffle;
use App\Models\Result;
use App\Services\CompanyRaffleResultService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyRaffleResultController extends Controller
{
    public function __construct(
        private readonly CompanyRaffleResultService $service
    ) {
        //
    }

    public function index(Request $request, Company $company, Raffle $raffle)
    {
        return $company->results()
            ->with('raffle:id,name,background_color')
            ->when($request->hour, fn($query) => $query->where('hour', $request->hour))
            ->latest()
            ->paginate();
    }

    public function store(CompanyRaffleResultRequest $request, Company $company, Raffle $raffle)
    {
        Gate::authorize('company-owner', $company);

        $this->service->store($request->validated(), $company, $raffle);

        return response()->noContent(200);
    }

    public function destroy(Company $company, $raffle, Result $result)
    {
        Gate::authorize('company-owner', $company);

        $this->service->destroy($company, $result);

        return response()->noContent(200);
    }
}
