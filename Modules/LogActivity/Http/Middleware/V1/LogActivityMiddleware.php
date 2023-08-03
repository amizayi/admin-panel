<?php

namespace Modules\LogActivity\Http\Middleware\V1;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\LogActivity\Jobs\V1\LoggerJob;
use Modules\LogActivity\Services\V1\Logger;

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
            $logInfo = (new Logger())->info($request);
            LoggerJob::dispatch($logInfo)->onQueue('activity_logs'); // Optionally, you can specify the queue name.
        } catch (Exception $e) {
            // Log the exception for debugging purposes
            Log::error('Error in Logger middleware: ' . $e->getMessage());
        }

        return $next($request);
    }
}
