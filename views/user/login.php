<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="form-box" id="login-box">
    <div class="header"><?= Yii::t('app', 'Sign In'); ?></div>

    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
    <div class="body bg-gray">
        <?= $form->field($model, 'email')->label(false)->textInput(['placeholder' => 'Email']); ?>
        <?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder' => 'Password']); ?>

        <div class="form-group">
            <?= Html::activeCheckbox($model, 'rememberMe'); ?>
        </div>
    </div>
    <div class="footer">
        <?= Html::submitButton(Yii::t('app', 'Sign In'), ['class' => 'btn bg-olive btn-block']) ?>

        <p><?= Html::a(Yii::t('app', 'I forgot my password'), ['user/forgot-password']); ?></p>
        <?= Html::a(Yii::t('app', 'Register a new membership'), ['user/register'], ['class' => 'text-center']); ?>
    </div>
    <?php ActiveForm::end(); ?>

<!--    <div class="margin text-center">-->
<!--        <span>Sign in using social networks</span>-->
<!--        <br/>-->
<!--        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>-->
<!--        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>-->
<!--        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>-->
<!---->
<!--    </div>-->
</div>