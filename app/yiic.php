<?php

// change the following paths if necessary
ini_set("max_execution_time", "0");
$config = dirname(__FILE__) . '/config/console.php';

defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

defined('YII_DEBUG') or define('YII_DEBUG', true);

$yiiBase = __DIR__ . '/../vendor/yiisoft/yii/framework/YiiBase.php';
require_once($yiiBase);
require_once(dirname(__FILE__) . '/yii.php');

require_once __DIR__ . '/app/ConsoleApplication.php';
require_once __DIR__ . '/../vendor/autoload.php';

if (isset($config)) {
    $app = Yii::createConsoleApplication($config);
    $app->commandRunner->addCommands(YII_PATH . '/cli/commands');
} else {
    $app = Yii::createConsoleApplication(array('basePath' => dirname(__FILE__) . '/cli'));
}

$env = @getenv('YII_CONSOLE_COMMANDS');
if (!empty($env)) {
    $app->commandRunner->addCommands($env);
}

$app->run();