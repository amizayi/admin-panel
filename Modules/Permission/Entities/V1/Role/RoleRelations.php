<?php

namespace Modules\Permission\Entities\V1\Role;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait RoleRelations
{
    /**
     * Get the parent role for this role.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, RoleFields::PARENT_ID);
    }

    /**
     * Get the child role for this role.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany($this, RoleFields::PARENT_ID);
    }
}
