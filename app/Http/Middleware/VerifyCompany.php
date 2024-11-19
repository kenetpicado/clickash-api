<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->route('company');

        if (!$company->imOwner() && auth()->user()->companies()->where('company_id', $company->id)->doesntExist()) {
            abort(403, 'No puedes acceder a esta empresa');
        }

        return $next($request);
    }
}
