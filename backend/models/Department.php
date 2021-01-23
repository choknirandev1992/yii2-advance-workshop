<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "department".
 *
 * @property string $department_id
 * @property string|null $department_name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['department_id'], 'required'],
            [['department_id', 'department_name'], 'string', 'max' => 100],
            [['department_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'รหัส',
            'department_name' => 'ชื่อแผนก',
        ];
    }
}
