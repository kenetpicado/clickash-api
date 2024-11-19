<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCompanyHasSale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->route('company');
        $sale = $request->route('sale');

        if ($company && $sale && $company->id !== $sale->company_id) {
            abort(404, 'No se encontró la venta');
        }

        return $next($request);
    }
}
