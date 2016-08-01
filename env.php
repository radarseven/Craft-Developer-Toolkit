<?php

/**
 * Require Composer autoloader.
 */
require_once(__DIR__ . '/vendor/autoload.php');

/**
 * Load DotEnv config.
 */
try {
    $dotenv = new Dotenv\Dotenv(__DIR__);
    $dotenv->load();
    $dotenv->required(['APP_ENV', 'APP_URL', 'DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);
} catch (Exception $e) {
    exit('Could not find a .env file.');
}

/**
 * Define environment based on the DotEnv config.
 */
$env = getenv('APP_ENV');
$url = getenv('APP_URL');

if (!$env || !$url) {
    exit('Missing variables for .env.');
}

/**
 * Define the custom environment and Craft's environment's constants.
 */
define('ENV', $env);
define('CRAFT_ENVIRONMENT', $env);

/**
 * Define protocol relative site URL.
 */
define('CRAFT_SITE_URL', '//' . $url);

/**
 * Move plugins path to right above web root.
 */
define('CRAFT_PLUGINS_PATH', realpath(__DIR__ . "/plugins") . '/');

/**
 * Move templates path to right above web root.
 */
define('CRAFT_TEMPLATES_PATH', realpath(__DIR__ . "/templates") . '/');
