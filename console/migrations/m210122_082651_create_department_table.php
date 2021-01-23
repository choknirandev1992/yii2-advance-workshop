<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%department}}`.
 */
class m210122_082651_create_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department}}', [
            'department_id' => $this->string(100),
            'department_name' => $this->string(100),
            'PRIMARY KEY (department_id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%department}}');
    }
}
