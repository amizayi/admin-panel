<?php

namespace Modules\Permission\Entities\V1\Permission;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait PermissionRelations
{
    /**
     * Get the parent permission for this permission.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, PermissionFields::PARENT_ID);
    }

    /**
     * Get the child permissions for this permission.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany($this, PermissionFields::PARENT_ID);
    }
}
