<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%inventory}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230403_222537_create_inventory_table extends Migration
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
            'created_by' => $this->integer(10),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-inventory-created_by}}',
            '{{%inventory}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-inventory-created_by}}',
            '{{%inventory}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-inventory-created_by}}',
            '{{%inventory}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-inventory-created_by}}',
            '{{%inventory}}'
        );

        $this->dropTable('{{%inventory}}');
    }
}
