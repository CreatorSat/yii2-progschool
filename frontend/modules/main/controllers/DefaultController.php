<?php

namespace app\modules\main\controllers;

use frontend\components\Common;
use yii\web\Controller;

/**
 * Default controller for the `main` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'bootstrap';
        return $this->render('index');
    }

    public function actionEvent() {
        $component = new Common();
        // подключение обработчика:
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        // вызываем метод, в котором объявлено событие
        $component->sendMail("test@domain.com","Test","Test text");
        // отключение обработчика:
        $component->off(Common::EVENT_NOTIFY, [$component,'notifyAdmin']);
    }
    // пример использования сервис-локатора:
    public function actionService() {
        /*
        // Первый вариант использования (первый вариант подключения):
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;
        */

        ///*
        // Второй вариант использования (второй вариант подключения):
        $cache = \Yii::$app->cache;
        //*/

        $cache->set("test", 1);
        print $cache->get("test");
    }

    public function actionPath() {
        /*
        * @yii - Указывает на папку с фреймворком в vendor
        * @app – Указывает на папку frontend
        * @runtime - указывает на папку frontend/runtime
        * @webroot - указывает на папку frontend/web
        * @web - указывает URL на папку frontend/web
        * @vendor - указывает на папку vendor
        * @bower – указывает на папку vendor/bower
        * @npm – указывает на папку vendor/npm
        * @frontend – указывает на frontend,алиас @app
        * @backend – указывает на папку backend/
        */
//        print \Yii::getAlias('@app');
        print \Yii::getAlias('@test');
    }
}
