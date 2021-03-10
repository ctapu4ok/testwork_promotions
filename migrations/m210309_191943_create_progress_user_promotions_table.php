<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progress_user_promotions}}`.
 */
class m210309_191943_create_progress_user_promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progress_user_promotions}}', [
            'id' => $this->primaryKey(),
            'promotion_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->boolean()->defaultValue(0),
            'date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%progress_user_promotions}}');
    }
}
