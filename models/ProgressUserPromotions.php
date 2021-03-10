<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "progress_user_promotions".
 *
 * @property int $id
 * @property int|null $promotion_id
 * @property int|null $user_id
 * @property int|null $status
 */
class ProgressUserPromotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'progress_user_promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotion_id', 'user_id', 'status'], 'integer'],
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
            'user_id' => 'User ID',
            'status' => 'Status',
        ];
    }


}
