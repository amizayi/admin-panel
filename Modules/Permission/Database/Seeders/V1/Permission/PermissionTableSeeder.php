<?php

namespace Modules\Permission\Database\Seeders\V1\Permission;

use Illuminate\Database\Seeder;
use Modules\Permission\Entities\V1\Permission\PermissionFields;
use Nwidart\Modules\Facades\Module;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Get all enabled modules
        $enabledModules = Module::allEnabled();

        foreach ($enabledModules as $module) {
            $moduleName = $module->getLowerName();
            // Get permissions for the module
            $permissions = config("$moduleName.policy.permission");

            if ($permissions) {
                // Create permissions for each module
                foreach ($permissions as $parentName => $children) {
                    // Create Parent
                    $parentPermission = permission()->create([
                        PermissionFields::NAME       => $parentName,
                        PermissionFields::TITLE      => __("$moduleName::policy.permission.$parentName.parent"),
                        PermissionFields::GUARD_NAME => 'api',
                    ]);
                    // Create Children
                    foreach ($children as $permissionName) {
                        $parentPermission->children()->create([
                            PermissionFields::NAME       => "{$parentName}_{$permissionName}",
                            PermissionFields::TITLE      => __("$moduleName::policy.permission.$parentName.$permissionName"),
                            PermissionFields::GUARD_NAME => 'api',
                        ]);
                    }
                }
            }
        }
    }
}
