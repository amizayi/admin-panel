<?php

return [
    'success' => [
        'base'          => '✅ Successfully',
        'store'         => '✨ :name created',
        'update'        => '💡 :name updated',
        'destroy'       => '🗑️ :name deleted',
    ],
    'error'   => [
        'base'          => '❌ Unsuccessful',
        'store'         => '🚫 Unable to create :name',
        'update'        => '🛑 Unable to update :name',
        'destroy'       => '🚯 Unable to delete :name',
    ],
    'auth'    => [
        'login'         => '🔐 Login successful',
        'logout'        => '👋 Logout successful',
        'unauthorized'  => '🚫 Unauthorized access',
        'failed'        => '❌ Authentication failed',
        'throttle'      => '⏳ Too many login attempts. Please try again later.',
        'incorrect_pwd' => '🔑 Incorrect password. Please try again.',
    ],
];
