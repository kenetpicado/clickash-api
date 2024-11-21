<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PlanResource;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = auth()->user()
            ->companies
            ->push(auth()->user()->company)
            ->sortBy('name')
            ->sortBy('status');

        return CompanyResource::collection($companies);
    }

    public function show(Company $company)
    {
        Gate::authorize('company-owner', $company);

        return PlanResource::collection($company->plans()->orderBy('expires_at', 'desc')->get());
    }

    public function update(CompanyRequest $request, Company $company)
    {
        Gate::authorize('company-owner', $company);

        $company->update($request->validated());

        return CompanyResource::make($company);
    }
}
