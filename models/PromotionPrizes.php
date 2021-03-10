<?php

namespace app\models;

use yii\db\ActiveQuery;

/**
 * This is the model class for table "promotion_prizes".
 *
 * @property int $id
 * @property int $promotion_id
 * @property string|null $prize
 * @property int|null $need_to_win
 *
 * @property Promotions $promotion
 */
class PromotionPrizes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotion_prizes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotion_id'], 'required'],
            [['promotion_id', 'need_to_win'], 'integer'],
            [['prize'], 'string', 'max' => 255],
            [['promotion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Promotions::className(), 'targetAttribute' => ['promotion_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'promotion_id' => 'Promotion ID',
            'prize' => 'Prize',
            'need_to_win' => 'Need To Win',
        ];
    }

    /**
     * Gets query for [[Promotion]].
     *
     * @return ActiveQuery
     */
    public function getPromotion()
    {
        return $this->hasOne(Promotions::className(), ['id' => 'promotion_id']);
    }
}
