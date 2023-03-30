<?php

namespace App\Http\Middleware;

use App\Enums\User\UserProviderEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class PublisherUserMiddleware
{

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        # Check Publisher User
        $user = Auth::user();

        if ($user->provider == UserProviderEnum::Publisher->value) {
            return $next($request);
        }

        # Abort Forbidden
        abort(403);

    }
}
