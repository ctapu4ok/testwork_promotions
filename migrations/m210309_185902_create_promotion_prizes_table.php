<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promotion_prizes}}`.
 */
class m210309_185902_create_promotion_prizes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%promotion_prizes}}', [
            'id' => $this->primaryKey(),
            'promotion_id' => $this->integer()->notNull(),
            'prize' => $this->string(),
            'max_prizes' => $this->integer()->defaultValue(0),
            'need_to_win' => $this->integer()->defaultValue(10000),
        ]);

        $this->addForeignKey(
            'fk_promotion_prizes',
            'promotion_prizes',
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
        $this->dropTable('{{%promotion_prizes}}');
    }
}
