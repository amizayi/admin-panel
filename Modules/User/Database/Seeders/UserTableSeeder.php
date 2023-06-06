<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Make Super Filament
        $this->mkSuperAdmin();
        // Make Many Users
        User::factory()->times(100)->create();
    }

    /**
     * Make Super Filament
     *
     * @return self
     */
    private function mkSuperAdmin(): self
    {
        User::create([
            'username'          => "DevAmiza",
            'first_name'        => "Amirreza",
            'last_name'         => "Rezaei",
            'full_name'         => "Amirreza Rezaei",
            'email'             => "admin@admin.com",
            'email_verified_at' => now(),
            'password'          => Hash::make("adminadmin"),
        ]);

        return $this;
    }
}
