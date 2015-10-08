<?php

/**
* General Configuration
*
* All of your system's general configuration settings go in here.
* You can see a list of the default settings in craft/app/etc/config/defaults/general.php
*/

$customGeneralConfig = array(

    'siteUrl'                         => 'http{% if craft.request.isSecure %}s{% endif %}:' . $_SERVER['SERVER_NAME'],

    // Triggers
    'cpTrigger'                       => 'admin',
    'resourceTrigger'                 => 'resources',
    'actionTrigger'                   => 'actions',
    'pageTrigger'                     => 'page/',

    // Manage our routes in the craft/config/routes.php file
    'siteRoutesSource'                => 'file',

    // URL rewriting auto-magically
    'omitScriptNameInUrls'            => true,
    'usePathInfo'                     => true,

    // Auto login after account activation
    'autoLoginAfterAccountActivation' => true,

    // Remember user sessions longer
    'rememberedUserSessionDuration'   => 'P3M',

    // PHP memory limit
    'phpMaxMemoryLimit'               => '512M',

    // Configures Craft to generate new image transforms right when getUrl() is called, rather than when the browser first requests the image.
    'generateTransformsBeforePageLoad'=> true,

    // Never use index.php in the URL
    'omitScriptNameInUrls'            => true,

    // Cache
    'cache'                           => false,

);

// Merge any environment-specific custom config settings
if (is_array($customEnvironmentConfig = @include (CRAFT_CONFIG_PATH . ENV . '/general.php'))) {
    $customGeneralConfig = array_merge($customGeneralConfig, $customEnvironmentConfig);
}

return $customGeneralConfig;
