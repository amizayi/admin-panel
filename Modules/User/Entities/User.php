<?php

namespace Modules\User\Entities;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Database\factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Fields\UserFields;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [UserFields::ID];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [UserFields::PASSWORD, UserFields::EMAIL_VERIFIED_AT];

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

    protected static function boot()
    {
        parent::boot();

        // Event listener for "creating" event
        static::creating(function ($user) {
            // Concatenate the first_name and last_name fields
            $user->{UserFields::FULL_NAME} = $user->{UserFields::FIRST_NAME} . ' ' . $user->{UserFields::LAST_NAME};
        });
    }

    public function canAccessFilament(): bool
    {
        return true;
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return null;
    }

    /**
     * Get user's name for filament
     *
     * @return Attribute
     */
    public function name(): Attribute
    {
        return new Attribute(
            get: fn() => $this?->{UserFields::FULL_NAME} ?? "user-".$this->{UserFields::ID}
        );
    }
}
