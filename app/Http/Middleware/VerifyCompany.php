<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

        if ($company->user_id !== auth()->id() && auth()->user()->companies()->where('company_id', $company->id)->doesntExist()) {
            abort(403, 'No tienes permisos para acceder a esta empresa.');
        }

        return $next($request);
    }
}
