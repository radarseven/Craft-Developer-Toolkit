<?php

/**
 * General Configuration
 * @url https://craftcms.com/docs/config-settings
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

// $_ENV constants are loaded by craft-multi-environment from .env.php via public/index.php
return array(

    // All environments
    '*'          => array(
        'siteUrl'                          => getenv('CRAFTENV_SITE_URL'),

        // Disable auto updates by default.
        'allowAutoUpdates'                 => false,

        // Triggers
        'cpTrigger'                        => 'admin',
        'resourceTrigger'                  => 'resources',
        'actionTrigger'                    => 'actions',
        'pageTrigger'                      => 'page/',

        // Manage our routes in the craft/config/routes.php file
        'siteRoutesSource'                 => 'file',

        // URL rewriting auto-magically
        'omitScriptNameInUrls'             => true,
        'usePathInfo'                      => true,

        // Auto login after account activation
        'autoLoginAfterAccountActivation'  => true,

        // Remember user sessions longer
        'rememberedUserSessionDuration'    => 'P3M',

        // PHP memory limit
        'phpMaxMemoryLimit'                => '512M',

        // Configures Craft to generate new image transforms right when getUrl() is called, rather than when the browser first requests the image.
        'generateTransformsBeforePageLoad' => true,

        // Never use index.php in the URL
        'omitScriptNameInUrls'             => true,

        // Cache
        'cache'                            => false,
        'cacheDuration'                    => false,

        // Require email address as username.
        'useEmailAsUsername'               => true,

        // Craft environment.
        'craftEnv'                         => CRAFT_ENVIRONMENT,

        // Set the environmental variables
        'environmentVariables'             => array(
            'baseUrl'  => getenv('CRAFTENV_BASE_URL'),
            'basePath' => getenv('CRAFTENV_BASE_PATH'),
        ),
    ),

    // Production environment
    'production' => array(
        'devMode'               => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates'      => false,
    ),

    // Staging (pre-production) environment
    'staging'    => array(
        'devMode'               => false,
        'enableTemplateCaching' => true,
        'allowAutoUpdates'      => false,
    ),

    // Local (development) environment
    'local'      => array(
        'devMode'               => true,
        'enableTemplateCaching' => false,
        'allowAutoUpdates'      => true,
    ),
);
