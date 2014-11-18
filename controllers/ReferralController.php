<?php

namespace app\controllers;

use yii\web\Controller;

/**
 * Class ReferralController
 * @package app\controllers
 */
class ReferralController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}
