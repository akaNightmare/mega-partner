<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;

/**
 * Class UserController
 * @package app\modules\api\controllers
 */
class UserController extends ActiveController
{

    public $modelClass = 'app\models\User';

}