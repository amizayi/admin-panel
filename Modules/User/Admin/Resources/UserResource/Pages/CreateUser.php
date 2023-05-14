<?php

namespace Modules\User\Admin\Resources\UserResource\Pages;

use Modules\User\Admin\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
