<?php

namespace App\Http\Middleware;

use App\Enums\User\UserProviderEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class CheckMerchantUserMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Merchant User
        $user = Auth::user();

        if ($user->provider == UserProviderEnum::Merchant->value) {
            return $next($request);
        }

        # Abort Forbidden
        abort(403);

    }
}
