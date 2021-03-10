<?php

use yii\db\Migration;
use yii\db\Schema;
/**
 * Handles the creation of table `{{%users}}`.
 */
class m210309_182814_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'username' => $this->string()->notNull()->unique(),
            'password' => $this->string()->notNull(),
            'role' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%users}}');
    }
}
