<?php

namespace Modules\Setting\Listeners;

use Log;
use Modules\Setting\Entities\Setting;
use Throwable;

class RefreshSettingCache
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(): void
    {
        try
        {
            Setting::refreshCache();
        }
        catch (Throwable $exception)
        {
            Log::error($exception->getMessage());
        }
    }
}
