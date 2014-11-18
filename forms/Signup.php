<?php
namespace app\forms;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class Signup extends Model
{

    public $email;
    public $password;
    public $retypePassword;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            [['password', 'retypePassword', 'email'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'This email address has already been taken.')],
            [['password', 'retypePassword'], 'string', 'min' => 2],
            ['retypePassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();

            $user->email = $this->email;
            $user->password = $this->password;
            $user->save(false);

            return $user;
        }

        return null;
    }
}