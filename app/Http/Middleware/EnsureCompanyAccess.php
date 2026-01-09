<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCompanyAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $routeSlug = $request->route('slug');

        $allowedSlug = session('portfolio_access');

        if ($routeSlug !== $allowedSlug) {
            return redirect()->route('login')->withErrors(['code' => 'Bitte erst Code eingeben.']);
        }

        return $next($request);
    }
}
