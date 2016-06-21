<?php
namespace frontend\controllers;

use frontend\models\Image;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $image_url = Image::getImageUrl();
        echo $image_url;
        return $this->render('index', ['url_image' => $image_url]);
    }

}
