<?php

namespace Modules\Permission\Entities\V1\Role;

use Modules\Permission\Traits\HasCustomRolePermission;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use RoleRelations;
}
