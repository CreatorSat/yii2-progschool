<div class="row contact">
    <div class="col-lg-6 col-sm-6">

        <?
        $form = \yii\bootstrap\ActiveForm::begin([
            'enableClientValidation' => false,
        ]);
        ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'subject') ?>
        <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>
        <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            'captchaAction' => \yii\helpers\Url::to(['main/captcha'])
        ]) ?>


        <?=\yii\helpers\Html::submitButton('Send',['class' => 'btn btn-success']) ?>
        <?
        \yii\bootstrap\ActiveForm::end();
        ?>


    </div>


</div>