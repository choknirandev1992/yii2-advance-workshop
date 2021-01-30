<?php

namespace common\models;

use Yii;
use backend\models\Staff;

/**
 * This is the model class for table "leave".
 *
 * @property int $id
 * @property string|null $staff_id
 * @property string|null $leave_year
 * @property string|null $leave_type
 * @property string|null $leave_day
 * @property string|null $leave_date_start
 * @property string|null $leave_date_end
 * @property float|null $leave_num
 * @property string|null $leave_reason
 * @property string|null $leave_status
 *
 * @property Staff $staff
 */
class Leave extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leave';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['leave_date_start', 'leave_date_end'], 'safe'],
            [['leave_num'], 'number'],
            [['staff_id'], 'string', 'max' => 5],
            [['leave_year'], 'string', 'max' => 4],
            [['leave_type', 'leave_day'], 'string', 'max' => 20],
            [['leave_reason'], 'string', 'max' => 255],
            [['leave_status'], 'string', 'max' => 1],
            [['staff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Staff::className(), 'targetAttribute' => ['staff_id' => 'staff_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'staff_id' => 'Staff ID',
            'leave_year' => 'Leave Year',
            'leave_type' => 'Leave Type',
            'leave_day' => 'Leave Day',
            'leave_date_start' => 'Leave Date Start',
            'leave_date_end' => 'Leave Date End',
            'leave_num' => 'Leave Num',
            'leave_reason' => 'Leave Reason',
            'leave_status' => 'Leave Status',
        ];
    }

    /**
     * Gets query for [[Staff]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaff()
    {
        return $this->hasOne(Staff::className(), ['staff_id' => 'staff_id']);
    }
}
