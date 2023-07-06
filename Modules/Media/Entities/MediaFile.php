<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\Fields\MediaFields;

class MediaFile extends Model
{
    use SoftDeletes;

    protected $guarded = [MediaFields::ID];
}
