<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyCompanyHasUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->route('company');
        $user = $request->user_id;

        if ($company && $user && ! $company->users()->where('users.id', $user)->exists()) {
            abort(404, 'El usuario no pertenece a la empresa');
        }

        return $next($request);
    }
}
