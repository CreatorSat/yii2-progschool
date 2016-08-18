<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

        <? $form = \yii\bootstrap\ActiveForm::begin([
            'id' => 'register-form',
//            'enableClientValidation' => false,
            'enableAjaxValidation' => true,
        ]); ?>

        <?= $form->field($model, 'username'); ?>
        <?= $form->field($model, 'email'); ?>
        <?= $form->field($model, 'password')->passwordInput(); ?>
        <?= $form->field($model, 'repassword')->passwordInput(); ?>

        <? echo \yii\helpers\Html::submitButton('Register', ['class' => 'btn btn-success']); ?>

        <? \yii\bootstrap\ActiveForm::end(); ?>
    </div>

</div>