<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
         $this->call([
             PermissionTableSeeder::class,
             RoleSeederTableSeeder::class,
             SyncPermissionToRoleTableSeeder::class,
         ]);
    }
}
