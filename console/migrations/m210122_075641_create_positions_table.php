<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%positions}}`.
 */
class m210122_075641_create_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'name' =>  $this->string(100)->notNull(),
        ]);

        $this->batchInsert('position',['name'],[
            ['โปรแกรมเมอร์'],
            ['ผู้จัดการทั่วไป'],
            ['แม่บ้าน']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%positions}}');
    }
}
