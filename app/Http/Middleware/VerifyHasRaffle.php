<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyHasRaffle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($raffle = $request->route('raffle') ?? $request->raffle_id) {
            $company = $request->route('company');

            $raffle_id = $raffle instanceof \App\Models\Raffle
                ? $raffle->id
                : $raffle;

            if (! $company->hasThisRaffle($raffle_id)) {
                abort(404, 'No se encontró la rifa.');
            }
        }

        return $next($request);
    }
}
