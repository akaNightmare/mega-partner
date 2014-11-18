<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 9]>
<html lang="<?= Yii::$app->language ?>" class="ie-all ie-9"><![endif]-->
<!--[if IE 8]>
<html lang="<?= Yii::$app->language ?>" class="ie-all ie-8"><![endif]-->
<!--[if IE]><!-->
<html lang="<?= Yii::$app->language ?>" class="no-js"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?= $content; ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>