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
        // вызываем метод, в котором объ€влено событие
        $component->sendMail("test@domain.com","Test","Test text");
        // отключение обработчика:
        $component->off(Common::EVENT_NOTIFY, [$component,'notifyAdmin']);
    }
    // пример использовани€ сервис-локатора:
    public function actionService() {
        /*
        // ѕервый вариант использовани€ (первый вариант подключени€):
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;
        */

        ///*
        // ¬торой вариант использовани€ (второй вариант подключени€):
        $cache = \Yii::$app->cache;
        //*/

        $cache->set("test", 1);
        print $cache->get("test");
    }

    public function actionPath() {
        /*
        * @yii - ”казывает на папку с фреймворком в vendor
        * @app Ц ”казывает на папку frontend
        * @runtime - указывает на папку frontend/runtime
        * @webroot - указывает на папку frontend/web
        * @web - указывает URL на папку frontend/web
        * @vendor - указывает на папку vendor
        * @bower Ц указывает на папку vendor/bower
        * @npm Ц указывает на папку vendor/npm
        * @frontend Ц указывает на frontend,алиас @app
        * @backend Ц указывает на папку backend/
        */
//        print \Yii::getAlias('@app');
        print \Yii::getAlias('@test');
    }
}
