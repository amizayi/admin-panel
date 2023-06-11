<?php

namespace Modules\Permission\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait for models with custom permission relationships.
 */
trait HasCustomRolePermission
{
    /**
     * Get the parent permission for this permission.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo($this, 'parent_id');
    }

    /**
     * Get the child permissions for this permission.
     *
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany($this, 'parent_id');
    }
}
