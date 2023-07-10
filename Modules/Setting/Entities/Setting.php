<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Setting\Fields\SettingFields;

class Setting extends Model
{
    use SoftDeletes;

    protected $table = 'settings';

    protected $guarded = [SettingFields::ID];
}
