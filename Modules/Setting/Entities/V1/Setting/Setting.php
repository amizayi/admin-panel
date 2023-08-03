<?php

namespace Modules\Setting\Entities\V1\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Modules\Setting\Events\V1\SettingModified;
use Throwable;

class Setting extends Model
{
    use SoftDeletes;

    protected $table = 'settings';

    protected $guarded = [SettingFields::ID];


    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => SettingModified::class,
        'updated' => SettingModified::class,
        'deleted' => SettingModified::class,
    ];

    /**
     * Get all setting pairs.
     *
     * @return Collection
     */
    public static function allFromDB(): Collection
    {
        try
        {
            return self::all()->mapWithKeys(fn($pair) => [$pair->{SettingFields::KEY} => $pair->{SettingFields::VALUE}]);
        }
        catch (Throwable)
        {
            return collect([]);
        }
    }

    /**
     * Get all cached setting pairs.
     *
     * @return Collection
     */
    public static function allFromCache(): Collection
    {
        try
        {
            return collect(Cache::rememberForever('settings', fn() => self::allFromDB()));
        }
        catch (Throwable)
        {
            return collect([]);
        }
    }

    /**
     * Refresh the cache.
     *
     * @return void
     */
    public static function refreshCache(): void
    {
        Cache::forget('settings');
        self::allFromCache();
    }
}
