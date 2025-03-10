<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerServiceExpert
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->role === 'customer_service' || $request->user()->role === 'bill_officer') {
            return $next($request);
        }

        return response()->json(['message' => 'Customer Service Expert Authorization Required'], 403);
    }
}
