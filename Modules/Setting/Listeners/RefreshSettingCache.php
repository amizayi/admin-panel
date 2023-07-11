<?php

namespace Modules\Setting\Listeners;

use Modules\Setting\Entities\Setting;
use Throwable;
use Log;

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
