<?php

namespace Modules\LogActivity\Entities\V1\LogActivity;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait LogActivityRelations
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            user()->model(),
            LogActivityFields::USER_ID
        );
    }
}
