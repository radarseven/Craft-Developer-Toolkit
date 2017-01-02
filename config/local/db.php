<?php

/**
 * Local environment database config.
 */

return array(
    'server'      => getenv('DB_HOST'),
    'user'        => getenv('DB_USER'),
    'password'    => getenv('DB_PASS'),
    'database'    => getenv('DB_NAME'),
    'tablePrefix' => 'craft',
);
