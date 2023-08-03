<?php

namespace Modules\Permission\Entities\V1\Role;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use RoleRelations;
}
