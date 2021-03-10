<?php

namespace app\models;

use yii\db\ActiveRecord;
/**
 * This is the model class for table "user_promotions".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $role
 */
class Users extends ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return true;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }


    /**
     * Gets query for [[UserPromotions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserPromotions()
    {
        return $this->hasMany(UserPromotions::className(), ['user_id' => 'id']);
    }
}
