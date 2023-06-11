<?php

namespace Modules\Permission\Entities;

use Modules\Permission\Traits\HasCustomRolePermission;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasCustomRolePermission;
}
