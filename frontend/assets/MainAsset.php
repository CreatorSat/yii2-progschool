<?
namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\View;

class MainAsset extends AssetBundle {

    public $basePath = '@webroot'; // задаем алиас: корневой файловый путь
    public $baseUrl = '@web'; // задаем алиас: путь в браузере

    // в массив $css кладем все стили
    public $css = [
        'source/style.css',
        'source/owl-carousel/owl.carousel.css',
        'source/owl-carousel/owl.theme.css',
        'source/slitslider/css/style.css',
        'source/slitslider/css/custom.css'
    ];

    // в массив $js кладем все скрипты
    public $js = [
        'source/script.js',
        'source/owl-carousel/owl.carousel.js',
        'source/slitslider/js/modernizr.custom.79639.js',
        'source/slitslider/js/jquery.ba-cond.min.js',
        'source/slitslider/js/jquery.slitslider.js',
        'source/js/google_analytics_auto.js'
    ];

    // зависимости (То есть классы).  Через них можно подключать дополнительные стили и скрипты
    public $depends = [
        // yii.js (файл написан под фреймворк. Есть метод, например, чтобы при нажатии на ссылку отправлялся
        // не GET, а POST запрос. Автоматически создастся форма и отправится), jquery.js
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset', // bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js - используется в шаблоне для слайдеров
    ];

    // дополнительный массив для настроек
    public $jsOptions = [
        // позиция подключения js скриптов. По-умолчанию - внизу страницы
        // POS_HEAD - заголовок страницы
        // POS_BEGIN - начало body
        // POS_END - конец body (используется по-умолчанию)
        // POS_READY - оборачивание в jQuery(document).ready()
        // POS_LOAD - оборачивание в jQuery(window).load()

      'position' =>  View::POS_HEAD,
    ];


}