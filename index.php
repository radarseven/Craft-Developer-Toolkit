<?php

/**
 * -----------------------------------------------------------
 * Start config modifications.
 * @url https://github.com/nystudio107/craft-multi-environment
 * -----------------------------------------------------------
 */

// Load the local Craft environment
if (file_exists('../.env.php')) {
    require_once '../.env.php';
}

// Default environment
if (!defined('CRAFT_ENVIRONMENT')) {
    define('CRAFT_ENVIRONMENT', getenv('CRAFTENV_CRAFT_ENVIRONMENT'));
}

/**
 * Move plugins path to right above web root.
 */
define('CRAFT_PLUGINS_PATH', realpath(__DIR__ . "/plugins") . '/');

/**
 * Move templates path to right above web root.
 */
define('CRAFT_TEMPLATES_PATH', realpath(__DIR__ . "/templates") . '/');

/**
 * -----------------------------------------------------------
 * END config modifications
 * -----------------------------------------------------------
 */

// Path to your craft/ folder
$craftPath = '../craft';

// Do not edit below this line
$path = rtrim($craftPath, '/') . '/app/index.php';

if (!is_file($path)) {
    if (function_exists('http_response_code')) {
        http_response_code(503);
    }

    exit('Could not find your craft/ folder. Please ensure that <strong><code>$craftPath</code></strong> is set correctly in ' . __FILE__);
}

require_once $path;
