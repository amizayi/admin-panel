<?php

namespace Modules\Permission\Entities\V1\Permission;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use PermissionRelations;
}
