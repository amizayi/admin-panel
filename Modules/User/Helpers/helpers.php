<?php


use Modules\User\Contracts\V1\Repositories\UserRepository;

if (!function_exists('user')) {
    /**
     * Get the User repo.
     *
     * @return UserRepository
     */
    function user(): UserRepository
    {
        return resolve(UserRepository::class);
    }
}
