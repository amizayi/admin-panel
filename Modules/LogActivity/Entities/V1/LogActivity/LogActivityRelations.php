<?php

namespace Modules\LogActivity\Entities\V1\LogActivity;

trait LogActivityRelations
{
    public function user()
    {
        return $this->belongsTo(
            user()->model(), LogActivityFields::USER_ID
        );
    }
}
