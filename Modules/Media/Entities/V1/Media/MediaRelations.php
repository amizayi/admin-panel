<?php

namespace Modules\Media\Entities\V1\Media;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait MediaRelations
{
    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }
}
