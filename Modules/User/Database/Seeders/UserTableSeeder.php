<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Modules\User\Entities\User;
use Modules\User\Enums\UserStatus;
use Modules\User\Fields\UserFields;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make Real Users
        $this->mkSystemAdministrator()
            ->mkProgrammer()
            ->mkRegularUser();
        // Make Fake Users
        User::factory()->times(10)->create();
    }

    /**
     * Make System Administrator
     *
     * @return self
     */
    private function mkSystemAdministrator(): self
    {
        $user = User::create([
            UserFields::USERNAME          => "system_administrator",
            UserFields::FIRST_NAME        => fake()->firstName(),
            UserFields::LAST_NAME         => fake()->lastName(),
            UserFields::EMAIL             => fake()->email(),
            UserFields::EMAIL_VERIFIED_AT => now(),
            UserFields::PASSWORD          => Hash::make("system_administrator"),
            UserFields::STATUS            => UserStatus::ACTIVE
        ]);

        $user->assignRole('system_administrator');

        return $this;
    }



    /**
     * Make Programmer
     *
     * @return self
     */
    private function mkProgrammer(): self
    {
        $user = User::create([
            UserFields::USERNAME          => "programmer",
            UserFields::FIRST_NAME        => fake()->firstName(),
            UserFields::LAST_NAME         => fake()->lastName(),
            UserFields::EMAIL             => fake()->email(),
            UserFields::EMAIL_VERIFIED_AT => now(),
            UserFields::PASSWORD          => Hash::make("programmer"),
            UserFields::STATUS            => UserStatus::ACTIVE
        ]);

        $user->assignRole('programmer');

        return $this;
    }

    /**
     * Make Regular User
     *
     * @return void
     */
    private function mkRegularUser(): void
    {
        $user = User::create([
            UserFields::USERNAME          => "regular_user",
            UserFields::FIRST_NAME        => fake()->firstName(),
            UserFields::LAST_NAME         => fake()->lastName(),
            UserFields::EMAIL             => fake()->email(),
            UserFields::EMAIL_VERIFIED_AT => now(),
            UserFields::PASSWORD          => Hash::make("regular_user"),
            UserFields::STATUS            => UserStatus::ACTIVE
        ]);

        $user->assignRole('regular_user');
    }
}
