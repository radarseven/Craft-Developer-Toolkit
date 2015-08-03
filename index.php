<?php

// Path to your craft/ folder
$craftPath = '../craft';

// Define protocol relative site URL
define('CRAFT_SITE_URL', '//' . $_SERVER['SERVER_NAME']);

// Check for .dev first
if (stristr($_SERVER['HTTP_HOST'], '.dev')) {
    define('ENV', 'local');
} else {
    // Setup environment-friendly configs
    switch ($_SERVER['HTTP_HOST']) {

        case 'example.com':
            define('ENV', 'prod');
            break;

        case 'dev.example.com'
            define('ENV', 'dev');
            break;

        default:
            define('ENV', 'prod');
            break;
    }
}

// Move plugins path to right above web root
define('CRAFT_PLUGINS_PATH', realpath(dirname(__FILE__) . "/../plugins") . '/');

// Move templates path to right above web root
define('CRAFT_TEMPLATES_PATH', realpath(dirname(__FILE__) . "/../templates") . '/');

// Do not edit below this line
$path = rtrim($craftPath, '/') . '/app/index.php';

if (!is_file($path)) {
    if (function_exists('http_response_code')) {
        http_response_code(503);
    }

    exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in ' . __FILE__);
}

require_once $path;
