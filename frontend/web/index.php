<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev'); // или prod

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php')
);

$application = new yii\web\Application($config);
/*
// ќбъ€вл€ем сервис-локатор.
// ѕервый способ:
// устанавливаем сервис-локатор дл€ нашего приложени€
$service = new \yii\di\ServiceLocator();
// добавл€ем классы:
$service->set("cache", 'yii\caching\FileCache');
// по идентификатору locator мы можем использовать сервис-локатор в проекте
// по идентификатору cache можем обращатьс€ к нашему классу FileCache
$application->set('locator', $service);
*/

// “ак как yii\web\Application уже €вл€етс€ сервис локатором
// то можно класс объ€вить по другому
// ¬торой способ:
$application->set('cache', 'yii\caching\FileCache');

$application->run();
