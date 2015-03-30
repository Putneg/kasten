<?php

return array(
    'preload' => array('debug'),

    'components' => array(
        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'pgsql:host=192.168.150.21;port=5432;dbname=allavia',
            'username' => 'developer',
            'password' => 'developer',
            'charset' => 'utf8',
            'enableProfiling'=>'true',
            'enableParamLogging' => true,
            'schemaCachingDuration' => 100,
        ),
        'db0'=>array(
            'class'=>'system.db.CDbConnection',
            'connectionString' => 'pgsql:host=192.168.150.21;port=5432;dbname=db0',
            'username' => 'developer',
            'password' => 'developer',
            'charset' => 'utf8',
            'enableProfiling'=>'true'
        ),

        /*'translations' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'pgsql:host=;dbname=',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => false,
            'enableParamLogging' => false,
            'schemaCachingDuration' => 3600,
        ),*/

        'debug' => array(
            'class' => 'vendor.zhuravljov.yii2-debug.Yii2Debug',
            'allowedIPs' => array('127.0.0.1','::1','37.57.132.240','192.168.68.1'),
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
            'ipFilters' => false//array('127.0.0.1', '::1'),
        ),
    ),
);