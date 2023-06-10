<?php


use Modules\Permission\Entities\Permission;
use Modules\Permission\Fields\PermissionFields;
use Nwidart\Modules\Facades\Module;

Route::get('/dev', function () {
//    // Get All Enabled Modules
//    $enabledModules = Module::allEnabled();
//    foreach ($enabledModules as $module) {
//        // Get Permission
//        $getPermissions = config("{$module->getLowerName()}.policy.permission");
//        // Check Hase Permission Of Module
//        if($getPermissions) {
//            foreach ($getPermissions as $parentName => $perChildren) {
//                $parent = Permission::create([
//                    PermissionFields::NAME       => $parentName,
//                    PermissionFields::TITLE      => $parentName,
//                    PermissionFields::GUARD_NAME => 'api',
//                ]);
//                foreach ($perChildren as $permissionName) {
//                  Permission::create([
//                        PermissionFields::NAME       => "{$parentName}_{$permissionName}",
//                        PermissionFields::TITLE      => "{$parentName}_{$permissionName}",
//                        PermissionFields::PARENT_ID  =>  $parent->id,
//                        PermissionFields::GUARD_NAME => 'api',
//                  ]);
//                }
//            }
//        }
//    }
});
