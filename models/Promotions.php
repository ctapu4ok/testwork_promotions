<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "promotions".
 *
 * @property int $id
 * @property string $name
 *
 * @property PromotionPrizes[] $promotionPrizes
 * @property UserPromotions[] $userPromotions
 */
class Promotions extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[UserPromotions]].
     *
     * @return ActiveQuery
     */
    public function getUserPromotions()
    {
        return $this->hasMany(UserPromotions::className(), ['promotion_id' => 'id']);
    }

    /**
     * Gets query for [[PromotionPrizes]].
     *
     * @return ActiveQuery
     */
    public function getPromotionPrizes()
    {
        return $this->hasMany(PromotionPrizes::className(), ['promotion_id' => 'id']);
    }
}
