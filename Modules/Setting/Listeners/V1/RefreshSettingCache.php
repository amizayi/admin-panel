<?php

namespace Modules\Setting\Listeners\V1;

use Log;
use Modules\Setting\Entities\V1\Setting\Setting;
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
