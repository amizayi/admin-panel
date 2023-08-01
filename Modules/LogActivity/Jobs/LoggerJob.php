<?php

namespace Modules\LogActivity\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LoggerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected mixed $logInfo;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($logInfo)
    {
        $this->logInfo = $logInfo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        dd($this->logInfo);
//        Log::info(json_encode($logInfo, JSON_PRETTY_PRINT));
    }
}
