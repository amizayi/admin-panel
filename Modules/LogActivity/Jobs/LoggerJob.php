<?php

namespace Modules\LogActivity\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        if (config('logactivity.config.file'))
            $this->logToFile($this->logInfo);

        if (config('logactivity.config.database'))
            $this->logToDatabase($this->logInfo);
    }

    /**
     * Log activity information to a file.
     *
     * @param array $logInfo The activity log information.
     * @return void
     */
    private function logToFile(array $logInfo): void
    {
        $logString = json_encode($logInfo, JSON_UNESCAPED_SLASHES) . PHP_EOL;
        File::append(storage_path('logs/activity.log'), $logString);
    }

    /**
     * Log activity information to the database.
     *
     * @param array $logInfo The activity log information.
     * @return void
     */
    private function logToDatabase(array $logInfo): void
    {
        DB::table('log_activities')->insert($logInfo);
    }
}
