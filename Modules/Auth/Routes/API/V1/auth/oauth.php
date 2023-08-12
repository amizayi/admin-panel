<?php

Route::prefix('oauth')

    ->as('oauth.')

    ->group(fn() => [

        // Github
        require 'oauth/github.php',
        // Google
        require 'oauth/google.php',
        // Facebook
        require 'oauth/facebook.php',

    ]);
