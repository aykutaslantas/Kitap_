<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Support\Facades\Auth;

class VerifyCsrfToken extends Middleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() && $request->route()->named('logout')) {
            $this->except[] = route('logout');
        }

        return parent::handle($request, $next);
    }

    /*
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
}
