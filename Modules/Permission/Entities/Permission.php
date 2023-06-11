<?php

namespace Modules\Permission\Entities;

use Modules\Permission\Traits\HasCustomRolePermission;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use HasCustomRolePermission;
}
