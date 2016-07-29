<?php
namespace app\modules\main\controllers;

use frontend\models\Image;
use frontend\models\SignupForm;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends Controller
{
    public $layout = "inner";

    public function actionIndex()
    {
        $image_url = Image::getImageUrl();
        echo $image_url;
        return $this->render('index');
    }

    public function actionRegister()
    {
        $model = new SignupForm;

        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {
            print_r($model->getAttributes());
            die;
        }

        return $this->render("register", ['model' => $model]);
    }
}
