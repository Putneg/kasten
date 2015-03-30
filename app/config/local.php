<?php

return array(
    'preload' => array('debug'),

    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',

            'connectionString' => 'mysql:host=localhost;dbname=insurance',
            'username' => 'dev_zotan',
            'password' => 'dev_zotan',
            'charset' => 'utf8',
            'enableProfiling'=>'true',
            
            'enableParamLogging' => true,
            'schemaCachingDuration' => 100,
        ),

        'debug' => array(
            'class' => 'app.extensions.yii2-debug.Yii2Debug',
            'allowedIPs' => array('127.0.0.1','::1','37.57.132.240','192.168.68.1','37.57.36.163'),
            'historySize' => 20,
        ),

        'fixture' => array(
            'class' => 'system.test.CDbFixtureManager',
        ),

        'log' => array(//configure log
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CProfileLogRoute',
                    'enabled' => isset($_REQUEST['debug']),
                    'levels' => 'trace, info, profile, warning, error',
                    'categories' => array('system.*', 'ar.*'),
                ),
            ),
        ),

        /*'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CWebLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),*/

        /*'authGrabber' => array(
            'class' => 'vendor.lightsoft.project-list.AuthStateGrabber',
            'key' => '',
            'secret' => '',
        ),*/
    ),

    'modules' => array(
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => false,//array('127.0.0.1', '::1'),
            //'newFileMode' => '777'
        ),
    ),
);