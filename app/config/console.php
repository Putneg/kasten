<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

Yii::setPathOfAlias('vendor', __DIR__ . '/../../vendor');

$config = array(
    'basePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Console Application',
    'sourceLanguage' => '00',
    'language' => 'ru',
    // preloading 'log' component
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
    ),
    // application components
    'components' => array(
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),

    ),

);
if ( file_exists(__DIR__ . '/local.php') )
{
    $config = CMap::mergeArray(
        $config,
        include __DIR__ . '/local.php'
    );
}

$config['preload'] = '';

return $config;