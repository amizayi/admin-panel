<?php

namespace Modules\LogActivity\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\LogActivity\Jobs\LoggerJob;
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
        try {
            $logInfo = Logger::info($request);
            LoggerJob::dispatch($logInfo)->onQueue('activity_logs'); // Optionally, you can specify the queue name.
        } catch (Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Error in Logger middleware: ' . $e->getMessage());
        }

        return $next($request);
    }
}
