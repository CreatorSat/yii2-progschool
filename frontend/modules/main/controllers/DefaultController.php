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
        // ����������� �����������:
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        // �������� �����, � ������� ��������� �������
        $component->sendMail("test@domain.com","Test","Test text");
        // ���������� �����������:
        $component->off(Common::EVENT_NOTIFY, [$component,'notifyAdmin']);
    }
    // ������ ������������� ������-��������:
    public function actionService() {
        /*
        // ������ ������� ������������� (������ ������� �����������):
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;
        */

        ///*
        // ������ ������� ������������� (������ ������� �����������):
        $cache = \Yii::$app->cache;
        //*/

        $cache->set("test", 1);
        print $cache->get("test");
    }

    public function actionPath() {
        /*
        * @yii - ��������� �� ����� � ����������� � vendor
        * @app � ��������� �� ����� frontend
        * @runtime - ��������� �� ����� frontend/runtime
        * @webroot - ��������� �� ����� frontend/web
        * @web - ��������� URL �� ����� frontend/web
        * @vendor - ��������� �� ����� vendor
        * @bower � ��������� �� ����� vendor/bower
        * @npm � ��������� �� ����� vendor/npm
        * @frontend � ��������� �� frontend,����� @app
        * @backend � ��������� �� ����� backend/
        */
//        print \Yii::getAlias('@app');
        print \Yii::getAlias('@test');
    }
}
