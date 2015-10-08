<?php

require_once('../vendor/autoload.php');

try {
    $dotenv = new Dotenv\Dotenv(dirname(__DIR__));
    $dotenv->load();
    $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
} catch (Exception $e) {
    exit('Could not find a .env file.');
}

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

        case 'templeton.org':
            define('ENV', 'prod');
            break;

        case 'www.templeton.synergemadev.com':
        case 'templeton.synergemadev.com':
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
