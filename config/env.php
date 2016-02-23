<?php

/**
 * Define environment based on the hostname.
 */

// Check for .dev first
if (stristr($_SERVER['HTTP_HOST'], '.dev')) {
    define('ENV', 'local');
} else {
    // Setup environment-friendly configs
    switch ($_SERVER['HTTP_HOST']) {
        default:
            define('ENV', 'prod');
        break;
    }
}
