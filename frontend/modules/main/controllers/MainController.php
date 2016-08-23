<?php
namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends Controller
{
    public $layout = "inner";

    public function actions()
    {
        return [
            'captcha' => [
                'class' => '\yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            // custom action
            'test' => [
                'class' => 'frontend\actions\TestAction',
            ]
        ];
    }

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
            $model->load(\Yii::$app->request->post());
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        // $model->load автоматически присвоит всем атрибутам значения из массива post
        // $model->validate() валидирует переданные данные и заполняет модель ошибками (если они есть)
        if (!\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post()) && $model->validate()/* && $model->signup()*/) {
            print_r($model->getAttributes());
            die;
        }

        return $this->render("register", ['model' => $model]);
    }

    public function actionContact()
    {
        $model = new ContactForm();

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            die("Form data is sending!!!");
        }

        return $this->render("contact", ['model' => $model]);
    }
}
