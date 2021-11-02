<?php

namespace App\Http\Middleware;

use App\Facades\ResponderProviderFacade;
use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if ($user) {
            return $next($request);
        }

        return ResponderProviderFacade::unauthorizedError(__('messages.response.unauthorized'));

    }
}
