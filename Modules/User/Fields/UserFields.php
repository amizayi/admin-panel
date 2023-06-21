<?php

namespace Modules\User\Fields;

/*
|--------------------------------------------------------------------------
| Model Const FIELDS
|--------------------------------------------------------------------------
*/

class UserFields
{
    const ID                     = 'id';
    const USERNAME               = 'username';
    const FIRST_NAME             = 'first_name';
    const LAST_NAME              = 'last_name';
    const FULL_NAME              = 'full_name';
    const EMAIL                  = 'email';
    const EMAIL_VERIFIED_AT      = 'email_verified_at';
    const PASSWORD               = 'password';
    const PASSWORD_CONFIRMATION  = self::PASSWORD.'_confirmation';
    const STATUS                 = 'status';
    const CREATED_AT             = 'created_at';
    const ROLES                  = 'roles';
}
