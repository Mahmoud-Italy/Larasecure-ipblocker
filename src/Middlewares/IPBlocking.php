<?php

namespace LaraSecure\IPBlocker\Middlewares;

use Closure;
use App\IPBlocker;

class IPBlocking {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {        
        if (IPBlocker::isBlocked()) {
            abort(403);
        }
        return $next($request);
    }

}