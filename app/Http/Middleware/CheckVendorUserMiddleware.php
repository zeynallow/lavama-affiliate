<?php

namespace App\Http\Middleware;

use App\Enums\User\UserProviderEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class CheckVendorUserMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Vendor User
        $user = Auth::user();

        if ($user->provider == UserProviderEnum::VENDOR->value) {
            return $next($request);
        }

        # Abort Forbidden
        abort(403);

    }
}
