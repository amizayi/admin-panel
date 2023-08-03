<?php

namespace Modules\Permission\Database\Seeders\V1;

use Illuminate\Database\Seeder;
use Modules\Permission\Entities\V1\Permission\Permission;
use Modules\Permission\Entities\V1\Permission\PermissionFields;
use Modules\Permission\Entities\V1\Role\Role;
use Modules\Permission\Entities\V1\Role\RoleFields;

class SyncPermissionToRoleTableSeeder extends Seeder
{

    protected array $rolePermission;

    public function __construct()
    {
        $this->rolePermission = config('permission.policy.role_permission');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach ($this->rolePermission as $roleName => $permissionGroups) {
            // Get Role
            $role = Role::where(RoleFields::NAME, $roleName)->first();

            if ($role) {
                $permissionsQuery = Permission::query();

                if ($permissionGroups === ['*'])
                    $permissionsQuery->whereNull(PermissionFields::PARENT_ID);
                 else
                    $permissionsQuery->whereIn(PermissionFields::NAME, $permissionGroups);

                $permissionsIds = $permissionsQuery->get()
                    ->flatMap(fn($group) => $group->children()->pluck(PermissionFields::ID)->toArray());

                 // Sync Permission Ids To Role
                $role->permissions()->sync($permissionsIds);
            }
        }
    }
}
