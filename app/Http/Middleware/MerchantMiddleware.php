<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class MerchantMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Merchant User
        $user = Auth::user();

        # Pass
        if (count($user->merchants) > 0) {
            return $next($request);
        }

        # Redirect Create New Merchant
        return redirect()->route('merchant.merchants.create');

    }
}
