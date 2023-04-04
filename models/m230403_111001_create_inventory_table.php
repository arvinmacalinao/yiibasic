<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inventory}}`.
 */
class m230403_111001_create_inventory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%inventory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'description' => $this->string(255),
            'created_by' => $this->integer(),
        ]);
    }
// name - varchar

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%inventory}}');
    }
}
