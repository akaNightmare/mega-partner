<?php

namespace app\models;

use Yii;
use app\models\base\User as BaseUser;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\Expression;

/**
 * Class User
 * @package app\models
 */
class User extends BaseUser implements IdentityInterface
{

    /**
     * @var string Plain password. Used for model validation.
     */
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            ['email', 'filter', 'filter' => 'trim'],
            [['email'], 'email'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'created_at',
                    self::EVENT_BEFORE_UPDATE => 'updated_at',
                    self::EVENT_BEFORE_DELETE => 'deleted_at',
                ],
                'value' => function () {
                    return new Expression('NOW()');
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'password_hash',
                ],
                'value' => function () {
                    return Yii::$app->getSecurity()->generatePasswordHash($this->password);
                },
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'auth_key',
                ],
                'value' => function () {
                    return Yii::$app->security->generateRandomString();
                }
            ],
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'name',
                    self::EVENT_BEFORE_UPDATE => 'name',
                ],
                'value' => function () {
                    if ($this->first_name === $this->last_name && $this->last_name === null) {
                        return null;
                    }

                    return implode(' ', [$this->first_name, $this->last_name]);
                },
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('\'findIdentityByAccessToken\' is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getAttribute('id');
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->getAttribute('auth_key');
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->getAttribute('password_hash'));
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->setAttribute('auth_key', Yii::$app->security->generateRandomString());
    }

}
