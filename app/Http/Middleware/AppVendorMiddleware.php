<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class AppVendorMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Vendor User
        $user = Auth::user();

        # Pass
        if (count($user->vendors) > 0) {
            return $next($request);
        }

        # Redirect Create New Vendor
        return redirect()->route('app-vendor.vendor.create');

    }
}
