<?php
header('Content-type: text/html; charset=utf-8');

// change the following paths if necessary
$yiiBase = __DIR__ . '/../vendor/yiisoft/yii/framework/YiiBase.php';
$yii = __DIR__ . '/../app/yii.php';
$config = __DIR__ . '/../app/config/main.php';

require_once __DIR__ . '/../app/config/env.php';
require_once __DIR__ . '/../vendor/autoload.php';

require_once($yiiBase);
require_once($yii);

require_once __DIR__ . '/../app/app/WebApplication.php';
Yii::createWebApplication($config)->run();