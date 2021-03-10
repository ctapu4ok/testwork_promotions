<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promotions}}`.
 */
class m210309_185313_create_promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%promotions}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%promotions}}');
    }
}
