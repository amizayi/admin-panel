<?php

namespace Modules\User\Database\factories\V1;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\V1\User\UserFields;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\User\Entities\V1\User\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $username = $this->faker->userName;

        return [
            UserFields::USERNAME          => $this->faker->username,
            UserFields::FIRST_NAME        => $this->faker->firstName,
            UserFields::LAST_NAME         => $this->faker->lastName,
            UserFields::EMAIL             => $this->faker->unique()->safeEmail,
            UserFields::MOBILE            => $this->faker->unique()->phoneNumber,
            UserFields::EMAIL_VERIFIED_AT => now(),
            UserFields::PASSWORD          => Hash::make($username),
        ];
    }
}

