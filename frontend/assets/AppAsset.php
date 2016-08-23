<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 * Класс отвечает за подключение ресурсов (js скрипты, стили, картинки)
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // стили
    public $css = [
        'css/site.css',
    ];
    // скрипты
    public $js = [
    ];
    // подключение зависимостей
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
