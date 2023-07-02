<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class PartnerMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Partner User
        $user = Auth::user();

        # Pass
        if (!is_null($user->partner)) {
            return $next($request);
        }

        # Redirect Create New Merchant
        return redirect()->route('publisher.settings.createPartner');

    }
}
