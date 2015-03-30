<?php

return array(
    'components' => array(

        'db' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'pgsql:host=;dbname=',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => false,
            'enableParamLogging' => false,
            'schemaCachingDuration' => 3600,
        ),


        'translations' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'pgsql:host=;dbname=',
            'username' => '',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => false,
            'enableParamLogging' => false,
            'schemaCachingDuration' => 3600,
        ),

        'authGrabber' => array(
            'key' => '',
            'secret' => '',

            'authUrl' => 'http://auth.travelpassport.ru/oauth',
            'requestUrl' => 'http://auth.travelpassport.ru/oauth/requestToken',
            'accessUrl' => 'http://auth.travelpassport.ru/oauth/accessToken',
            'userInfoUrl' => 'http://auth.travelpassport.ru/oauth/userInfo',
            'logoutUrl' => 'http://auth.travelpassport.ru/auth/logout',
        ),

        "travelpassport" => array(
            "serverUrl" => "http://auth.travelpassport.ru"
        ),

        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CEmailLogRoute',
                    'levels' => 'error, warning',
                    'except' => 'exception.CHttpException.*',
                    // add your email in this section
                    'emails' => array('oleynikov@lightsoft.ru'),
                ),
            ),
        ),
    )
);
