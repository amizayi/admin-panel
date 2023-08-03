<?php

namespace Modules\Permission\Database\Seeders\V1\Role;

use Illuminate\Database\Seeder;
use Modules\Permission\Entities\V1\Role\RoleFields;

class RoleSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get permissions for the module
        $roles = config('permission.policy.role');

        if ($roles) {
            // Create permissions for each module
            foreach ($roles as $parentName => $children) {
                // Create Parent
                $parentRole = role()->create([
                    RoleFields::NAME       => $parentName,
                    RoleFields::TITLE      => __("permission::policy.role.$parentName.parent"),
                    RoleFields::GUARD_NAME => 'api',
                ]);
                // Create Children
                foreach ($children as $roleName) {
                    $parentRole->children()->create([
                        RoleFields::NAME       => "{$roleName}",
                        RoleFields::TITLE      => __("permission::policy.role.$parentName.$roleName"),
                        RoleFields::PARENT_ID  => $parentRole->id,
                        RoleFields::GUARD_NAME => 'api',
                    ]);
                }
            }
        }
    }
}
