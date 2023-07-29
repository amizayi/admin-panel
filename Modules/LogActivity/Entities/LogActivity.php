<?php

namespace Modules\LogActivity\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\LogActivity\Fields\LogFields;

class LogActivity extends Model
{
    protected $table = 'log_activities';

    protected $guarded = [LogFields::ID];
}
