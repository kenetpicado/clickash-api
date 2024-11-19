<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function __invoke(Request $request)
    {
        $company = Company::where('workspace_code', $request->workspace_code)->first();

        if (!$company) {
            abort(404, 'No se encontró el espacio de trabajo.');
        }

        $company->users()->syncWithoutDetaching(auth()->id());

        return CompanyResource::make($company);
    }
}