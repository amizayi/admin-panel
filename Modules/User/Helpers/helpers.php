<?php


use Modules\User\Repositories\Contracts\UserRepository;

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
