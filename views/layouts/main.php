<?php
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\bootstrap\Alert;
use \yii\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
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
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<?php $this->beginBody() ?>
<header class="header">
    <?= Html::a(Yii::t('app', 'Mega partner'), '/', ['class' => 'logo']); ?>
    <!-- Navigation -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?= Yii::$app->getUser()->getIdentity()->email; ?> <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image"/>

                            <p>
                                Jane Doe - Web Developer
                                <small>Member
                                    since <?= date('M. Y', strtotime(Yii::$app->getUser()->getIdentity()->created_at)); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <?= Html::a(Yii::t('app', 'Profile'), ['user/profile'], ['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(Yii::t('app', 'Sign out'), ['user/logout'], ['class' => 'btn btn-default btn-flat']); ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- # -->
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <!--            <div class="user-panel">-->
            <!--                <div class="pull-left image">-->
            <!--                    <img src="img/avatar3.png" class="img-circle" alt="User Image"/>-->
            <!--                </div>-->
            <!--                <div class="pull-left info">-->
            <!--                    <p>Hello</p>-->
            <!--                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
            <!--                </div>-->
            <!--            </div>-->
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="<?= Yii::t('app', 'Search') ?>..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
            echo Menu::widget([
                'encodeLabels' => false,
                'options' => [
                    'class' => 'sidebar-menu',
                ],
                'activateParents' => true,
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'items' => [
                    ['label' => '<i class="fa fa-dashboard"></i>'. Yii::t('app', 'Dashboard'), 'url' => ['dashboard/index']],
                    ['label' => '<i class="fa fa-users"></i>'. Yii::t('app', 'Referrals'), 'url' => ['referral/index']],
                    ['label' => '<i class="fa fa-calculator"></i>'. Yii::t('app', 'Banners'), 'url' => ['banner/index']],
                    ['label' => '<i class="fa fa-user"></i>'. Yii::t('app', 'Profile'), 'url' => ['user/update']],
                ],
            ]);
            ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php if (!empty($this->params['breadcrumbs'])): ?>
                    <?= end($this->params['breadcrumbs']); ?>
                <?php else: ?>
                    <?= Yii::t('app', 'Dashboard'); ?>
                <?php endif; ?>
                <small><?= Yii::t('app', 'Control panel'); ?></small>
            </h1>
            <?= yii\widgets\Breadcrumbs::widget([
                'tag' => 'ol',
                'options' => [
                    'class' => 'breadcrumb',
                ],
                'links' => !empty($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//                'homeLink' => Html::a('<i class="fa fa-dashboard"></i> Home', ['default/index']),
            ]) ?>

            <!--            <ol class="breadcrumb">-->
            <!--                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>-->
            <!--                <li class="active">Dashboard</li>-->
            <!--            </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            foreach (['error', 'warning', 'success'] as $type) :
                if (Yii::$app->getSession()->hasFlash($type)) :
            ?>
                <?php Alert::begin(['options' => ['class' => "alert-{$type} alert-dismissable"]]); ?>
                <?= Yii::$app->getSession()->getFlash($type); ?>
                <?php Alert::end(); ?>
            <?php
                endif;
            endforeach; ?>

            <?= $content ?>
        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
