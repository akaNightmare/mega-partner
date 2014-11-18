<?php

namespace app\forms;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Class User
 * @package app\forms
 */
class Login extends Model
{

    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'filter', 'filter' => 'trim'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     */
    public function validatePassword($attribute)
    {
        if ($this->hasErrors()) {
            return;
        }

        if (!($user = $this->getUser())) {
            $this->addError('email', Yii::t('app', 'User does not exist'));
        } elseif (!$user->validatePassword($this->password)) {
            $this->addError($attribute, Yii::t('app', 'Invalid login or password'));
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? Yii::$app->params['rememberFor'] : 0);
        }

        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->where(['email' => $this->email])->one();
        }

        return $this->_user;
    }

}