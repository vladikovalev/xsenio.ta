<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $authKey
 */
class User extends ActiveRecord implements IdentityInterface
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return '{{%users}}';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['name', 'email', 'password', 'authKey'], 'string', 'max' => 255],
    ];
  }

  /**
   * Finds an identity by the given ID.
   *
   * @param string|int $id the ID to be looked for
   * @return IdentityInterface|null the identity object that matches the given ID.
   */
  public static function findIdentity($id)
  {
    return static::findOne($id);
  }

  /**
   * Finds an identity by the given token.
   *
   * @param string $token the token to be looked for
   * @return IdentityInterface|null the identity object that matches the given token.
   */
  public static function findIdentityByAccessToken($token, $type = null)
  {
    return static::findOne(['authKey' => $token]);
  }

  /**
   * @return int|string current user ID
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @return string current user auth key
   */
  public function getAuthKey()
  {
    return $this->authKey;
  }

  /**
   * @param string $authKey
   * @return bool if auth key is valid for current user
   */
  public function validateAuthKey($authKey)
  {
    return $this->getAuthKey() === $authKey;
  }

  /**
   * Finds user by email
   *
   * @param string $email
   * @return static|null
   */
  public static function findByEmail($email)
  {
    return static::findOne(['email' => $email]);
  }

  /**
   * Validates password
   *
   * @param string $password password to validate
   * @return bool if password provided is valid for current user
   */
  public function validatePassword($password)
  {
    return $this->password === $password;
  }

  /**
   * Generate accessToken string
   * @throws \yii\base\Exception
   */
  public function generateAccessToken()
  {
    $this->authKey = Yii::$app->security->generateRandomString();
  }
}
