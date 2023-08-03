<?php

namespace Modules\User\Enums\V1;

enum UserStatus: int
{
    const ACTIVE    = 1; // User is active
    const INACTIVE  = 2; // User is inactive
    const PENDING   = 3; // User account is pending activation
    const BLOCKED   = 4; // User is blocked
    const ARCHIVED  = 5; // User account is archived
    const SUSPENDED = 6; // User account is suspended
    const DELETED   = 7; // User account is deleted
}
