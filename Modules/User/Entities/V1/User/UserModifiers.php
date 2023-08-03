<?php

namespace Modules\User\Entities\V1\User;

trait UserModifiers
{
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($user) {
            // Concatenate the first_name and last_name fields
            $user->{UserFields::FULL_NAME} = $user->{UserFields::FIRST_NAME} . ' ' . $user->{UserFields::LAST_NAME};
        });
    }
}
