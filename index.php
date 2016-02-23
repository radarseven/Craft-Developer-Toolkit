<?php

require_once('../vendor/autoload.php'); // Composer autoload for DotEnv support.
require_once('../craft/config/env.php'); // Environment configs.

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
