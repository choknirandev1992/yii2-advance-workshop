<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prefix".
 *
 * @property string $prefix_id
 * @property string|null $prefix_name
 *
 * @property Staff[] $staff
 */
class Prefix extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prefix';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prefix_id'], 'required'],
            [['prefix_id'], 'string', 'max' => 2],
            [['prefix_name'], 'string', 'max' => 50],
            [['prefix_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prefix_id' => 'Prefix ID',
            'prefix_name' => 'Prefix Name',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasMany(Staff::className(), ['prefix_id' => 'prefix_id']);
    }
}
