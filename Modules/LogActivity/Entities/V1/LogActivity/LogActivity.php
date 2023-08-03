<?php

namespace Modules\LogActivity\Entities\V1\LogActivity;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use LogActivityRelations;

    protected $table = 'log_activities';

    protected $guarded = [LogActivityFields::ID];
}
