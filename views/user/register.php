<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="form-box" id="register-box">
    <div class="header"><?= Yii::t('app', 'Register a new membership') ?></div>
    <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
        <div class="body bg-gray">
            <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => Yii::t('app', 'Email')]); ?>
            <?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder' => Yii::t('app', 'Password')]); ?>
            <?= $form->field($model, 'retypePassword')->label(false)->passwordInput(['placeholder' => Yii::t('app', 'Retype password')]); ?>
        </div>
        <div class="footer">
            <?= Html::submitButton(Yii::t('app', 'Sign me up'), ['class' => 'btn bg-olive btn-block']) ?>
            <?= Html::a(Yii::t('app', 'I already have a membership'), ['user/login'], ['class' => 'text-center']); ?>
        </div>
    <?php ActiveForm::end(); ?>
<!--    <div class="margin text-center">-->
<!--        <span>Register using social networks</span>-->
<!--        <br/>-->
<!--        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>-->
<!--        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>-->
<!--        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>-->
<!--    </div>-->
</div>