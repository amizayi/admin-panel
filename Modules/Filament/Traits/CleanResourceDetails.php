<?php

namespace Modules\Filament\Traits;

trait CleanResourceDetails
{
    protected static function getNavigationIcon(): string
    {
        return __('filament::resource.' . self::$key . '.icon');
    }

    public static function getLabel(): ?string
    {
        return __('filament::resource.' . self::$key . '.trans.single');
    }

    public static function getPluralLabel(): ?string
    {
        return __('filament::resource.' . self::$key . '.trans.plural');
    }

    protected static function getNavigationSort(): ?int
    {
        return (int)__('filament::resource.' . self::$key . '.nav.sort');
    }

    protected static function getNavigationGroup(): ?string
    {
        $_group = __('filament::resource.' . self::$key . '.nav.group');
        return __('filament::nav.' . $_group . '.label');
    }
}
