<?php

namespace Modules\Permission\Entities\V1\Permission;

use Modules\Permission\Traits\HasCustomRolePermission;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use PermissionRelations;
}
