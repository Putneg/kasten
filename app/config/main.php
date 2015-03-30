<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
date_default_timezone_set('Europe/Moscow');
Yii::setPathOfAlias('vendor', __DIR__ . '/../../vendor');
Yii::setPathOfAlias('app', __DIR__ . '/..');



$config = array(
    'basePath' => __DIR__ . DIRECTORY_SEPARATOR . '..',
    'name' => 'Kastenwagen',

    'sourceLanguage' => 'ua',
    'language' => 'ua',

    // 'defaultController' => 'adv/index',

    // preloading 'log' component
    'preload' => array('log', /*'translate',*/ /*'authGrabber'*/),

    'modules' => array(),

    'aliases' => array(
        'bootstrap' => realpath(__DIR__ . '/../../vendor/2amigos/yiistrap'), // change this if necessary
        'yiiwheels' => realpath(__DIR__ . '/../../vendor/2amigos/yiiwheels'), // change this if necessary
    ),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'bootstrap.helpers.TbHtml',
        'application.helpers.*',
    ),

    // changing hotel without redirect
    //'onBeginRequest' => array('HotelSelector', 'setUserAllocationEvent'),

    // application components
    'components' => array(
        'request'=>array(
            'class'=>'DLanguageHttpRequest',
            'baseUrl'=>'',
        ),
        'urlManager'=>array(
            'class'=>'DLanguageUrlManager',
        ),

        /*'authGrabber' => array(
            'class' => 'vendor.lightsoft.project-list.AuthStateGrabber',
        ),*/

        /*"travelpassport" => array(
            "class" => '\Lightsoft\REST\Client\Travelpassport',
        ),*/

        /*'translate' => array(
            'class' => 'vendor.lightsoft.translate.Translate',
            'projectId' => '',
            'connectionId' => 'translations'
        ),*/

        "user" => array(
            "class" => 'vendor.lightsoft.project-list.helpers.WebUser',
            'loginUrl' => array('auth/login'),
        ),

        'cache' => array(
            'class' => 'CFileCache',
        ),

        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
            'baseUrl' => '/components/bootstrap',
        ),

        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),

        'urlManager'=>array(
            'class' => 'DLanguageUrlManager',
            'urlRuleClass' => 'DLanguageUrlRule',
            'urlFormat'=>'path',
            'rules'=>array(
                '/'=>'index/index',
                '/'=>'/index',
                'calculator/'=>'calculator/index',
                'transport/'=>'transport/index',
                'news/'=>'news/index',
                //'static/<id:\d+>'=>'static/index',
                array('static/index', 'pattern'=>'static/<id:\d+>'),
                'cp/<action:\w+>/<par1:\w+>/<par2:\w+>'=>'cp/<action>',
                'cp/<action:\w+>/<par1:\w+>'=>'cp/<action>',
               // array('news/index', 'pattern'=>'news/'),
                //array('news/index', 'pattern'=>'static/<id:\d+>'),
                'image/operator/<id:[\w]+>'=>'image/operator',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
            'showScriptName'=>false
        ),

        /*'clientScript' => array(
            'class' => 'vendor.bestxp.EClientScript.EClientScript',
            'combineScriptFiles' => !YII_DEBUG,
            // By default this is set to false, set this to true if you'd like to combine the script files
            'combineCssFiles' => !YII_DEBUG,
            // By default this is set to false, set this to true if you'd like to combine the css files
            'optimizeCssFiles' => !YII_DEBUG,
            'optimizeScriptFiles' => !YII_DEBUG,
            // CSS files for ignore
            'cssForIgnore' => array(
                'bootstrap.min.css',
                'jquery-ui-1.7.1.custom.css',
                'jquery-ui.multiselect.css',
                'redactor.css',
                'bootstrap.css',
                'bootstrap-responsive.css',
                'additions.css',
                'orange.css',
                'responsive.css',
                'default.css',
                'font-awesome.min.css',
            ),
            // JS files for ignore
            'scriptsForIgnore' => array(
                'jquery.js',
                'jquery.min.js',
                'jquery.ui.js',
                'jquery-ui.min.js',
                'bootstrap.min.js',
                'bootstrap.js',
                'angular.min.js',
                'angular-resource.min.js',
                'amcharts.js',
                'redactor.min.js',
                'redactor.js',
            ),
            'packages' => array(
                'project' => array(
                    'basePath' => 'app.assets',
                    'css' => array(
                        'css/general.css',
                        'css/layout.css',
                        'css/selectbox.css',
                        'css/b-cloud.css',
                        'css/b-gray-filter.css',
                        'css/b-menu-panel.css',
                        'css/b-interview-hbrand.css',
                        'css/b-pager.css',
                    ),
                    'js' => array(
                        'js/b-cloud.js',
                        'js/placeholder.js',
                        'js/init.js',
                        'js/jquery.selectBoxIt.min.js',
                        'js/tinynav.js',
                        'js/main.js',
                    ),
                    'depends' => array(
                        'jquery',
                        'jquery.ui',
                    )
                ),
                'bootstrap' => array(
                    'baseUrl' => '/js/a/bootstrap',
                    'css' => array(
                        'css/bootstrap.css',
                        'css/bootstrap-responsive.css',
                        'css/default.css',
                        'font-awesome/css/font-awesome.min.css',
                        'css/additions.css',
                    ),
                    'js' => array(
                        'js/bootstrap.js'
                    ),
                    'depends' => array(
                        'jquery'
                    )
                ),
            ),
        ),*/

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'mailer' => array(
            'class' => 'application.extensions.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'translatedLanguages'=>array(
            'ua'=>'Ua',
            'ru'=>'Ru',
        ),
        'defaultLanguage'=>'ua',
    ),
);


if ( file_exists(__DIR__ . '/local.php') )
{
    $config = CMap::mergeArray(
        $config,
        include __DIR__ . '/local.php'
    );
}

$config = CMap::mergeArray(
        $config,
        include __DIR__ . '/country_list.php'
    );

$config = CMap::mergeArray(
        $config,
        include __DIR__ . '/airport_exceptions.php'
    );

return $config;