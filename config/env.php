<?php

/**
 * Define environment based on the hostname.
 */

try {
    $env = getenv('APP_ENV');
    define('ENV', $env);
    define('CRAFT_ENVIRONMENT', $env);
} catch (Exception $e) {
    return $e->getMessage();
}
