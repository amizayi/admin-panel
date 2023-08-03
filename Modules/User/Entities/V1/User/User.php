<?php

namespace Modules\User\Entities\V1\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Database\factories\V1\UserFactory;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use
        HasApiTokens,
        HasFactory,
        Notifiable,
        HasRoles,
        UserModifiers;

    /**
     * The name of the authentication guard used by this model.
     *
     * @var string
     */
    protected string $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        UserFields::ID
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        UserFields::PASSWORD,
        UserFields::EMAIL_VERIFIED_AT
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        UserFields::EMAIL_VERIFIED_AT => 'datetime',
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return UserFactory::new();
    }
}
