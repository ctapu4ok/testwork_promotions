<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_promotions".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $promotion_id
 * @property string|null $begin_date
 * @property string|null $end_date
 *
 * @property Promotions $promotion
 * @property Users $user
 * @property ProgressUserPromotions $progressUserPromotions
 */
class UserPromotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'promotion_id'], 'integer'],
            [['begin_date', 'end_date'], 'safe'],
            [['promotion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Promotions::className(), 'targetAttribute' => ['promotion_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'promotion_id' => 'Promotion ID',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * Gets query for [[Promotion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPromotion()
    {
        return $this->hasOne(Promotions::className(), ['id' => 'promotion_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[ProgressUserPromotions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgressUserPromotions()
    {
        return $this->hasMany(ProgressUserPromotions::className(), ['promotion_id' => 'id']);
    }
}
