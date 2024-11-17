<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;

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

    public function update(CompanyRequest $request, Company $company)
    {
        if ($company->user_id !== auth()->id()) {
            abort(403, 'Esta empresa no te pertenece.');
        }

        $company->update($request->validated());

        return CompanyResource::make($company);
    }
}
