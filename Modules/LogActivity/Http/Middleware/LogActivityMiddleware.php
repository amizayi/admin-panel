<?php

namespace Modules\LogActivity\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\LogActivity\Services\Logger;

class LogActivityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        Logger::make($request);
        return $next($request);
    }
}
