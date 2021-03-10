<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_promotions}}`.
 */
class m210309_185329_create_user_promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%user_promotions}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'promotion_id' => $this->integer(),
            'begin_date' => $this->dateTime(),
            'end_date' => $this->dateTime(),
        ]);

        $this->addForeignKey(
            'fk_user_promotion',
            'user_promotions',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_promotions_user_promotion',
            'user_promotions',
            'promotion_id',
            'promotions',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%user_promotions}}');
    }
}
