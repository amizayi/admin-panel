<?php

namespace Modules\Media\Entities\V1\Media;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaFile extends Model
{
    use
        SoftDeletes,
        MediaRelations;

    protected $table = 'media_files';

    protected $guarded = [MediaFields::ID];

}
