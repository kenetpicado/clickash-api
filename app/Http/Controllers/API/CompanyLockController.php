<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyLockRequest;
use App\Http\Resources\LockResource;
use App\Models\Company;
use App\Models\Lock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyLockController extends Controller
{
    public function index(Request $request, Company $company)
    {
        $data = $company->locks()
            ->with(['raffle:id,name', 'user:id,name'])
            ->latest()
            ->when(
                $request->raffle_id,
                fn ($query) => $query->where('raffle_id', $request->raffle_id)
            )
            ->when(
                $request->user_id,
                fn ($query) => $query->where('user_id', $request->user_id)
            )
            ->paginate();

        return LockResource::collection($data);
    }

    public function store(CompanyLockRequest $request, Company $company)
    {
        Gate::authorize('company-owner', $company);

        $company->locks()->create($request->validated());

        return response()->noContent(200);
    }

    public function destroy(Company $company, Lock $lock)
    {
        Gate::authorize('lock-destroy', [$company, $lock]);

        $lock->delete();

        return response()->noContent(200);
    }
}
