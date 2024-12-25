<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BdMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check country code
        $countryCode = $request->header('cf-ipcountry');
        if ($countryCode !== 'BD') {
            return response()->json(['error' => 'Access denied.'], 403);
        }

        return $next($request);
    }
}