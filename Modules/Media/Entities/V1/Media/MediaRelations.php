<?php

namespace Modules\Media\Entities\V1\Media;

trait MediaRelations
{
    public function mediable()
    {
        return $this->morphTo();
    }
}
