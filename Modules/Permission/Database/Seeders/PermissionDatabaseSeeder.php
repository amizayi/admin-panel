<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\Database\Seeders\V1\Permission\PermissionTableSeeder;
use Modules\Permission\Database\Seeders\V1\Role\RoleSeederTableSeeder;
use Modules\Permission\Database\Seeders\V1\SyncPermissionToRoleTableSeeder;

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
