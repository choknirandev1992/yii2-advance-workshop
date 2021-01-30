<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "staff".
 *
 * @property string $staff_id
 * @property string|null $prefix_id
 * @property string|null $staff_firstname
 * @property string|null $staff_lastname
 * @property string|null $staff_date_work_start
 * @property int|null $position_id
 * @property string|null $department_id
 * @property string|null $staff_address
 * @property string|null $staff_tel
 * @property string|null $staff_picture
 * @property string|null $staff_work_status
 *
 * @property Prefix $prefix
 * @property Position $position
 * @property Department $department
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id'], 'required'],
            [['staff_date_work_start'], 'safe'],
            [['position_id'], 'integer'],
            [['staff_id'], 'string', 'max' => 5],
            [['prefix_id', 'department_id'], 'string', 'max' => 2],
            [['staff_firstname', 'staff_lastname'], 'string', 'max' => 100],
            [['staff_address', 'staff_picture'], 'string', 'max' => 255],
            [['staff_tel'], 'string', 'max' => 150],
            [['staff_work_status'], 'string', 'max' => 1],
            [['staff_id'], 'unique'],
            [['prefix_id'], 'exist', 'skipOnError' => true, 'targetClass' => Prefix::className(), 'targetAttribute' => ['prefix_id' => 'prefix_id']],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::className(), 'targetAttribute' => ['position_id' => 'id']],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'department_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'staff_id' => 'Staff ID',
            'prefix_id' => 'Prefix ID',
            'staff_firstname' => 'Staff Firstname',
            'staff_lastname' => 'Staff Lastname',
            'staff_date_work_start' => 'Staff Date Work Start',
            'position_id' => 'Position ID',
            'department_id' => 'Department ID',
            'staff_address' => 'Staff Address',
            'staff_tel' => 'Staff Tel',
            'staff_picture' => 'Staff Picture',
            'staff_work_status' => 'Staff Work Status',
        ];
    }

    /**
     * Gets query for [[Prefix]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrefix()
    {
        return $this->hasOne(Prefix::className(), ['prefix_id' => 'prefix_id']);
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::className(), ['id' => 'position_id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['department_id' => 'department_id']);
    }

    //สร้างคอลัมน์ fullname
    public function getFullname(){
        return $this->staff_firstname.' '.$this->staff_lastname;
    }

    //ดึงข้อมูลไปใส่ที่ dropdown list
    public static function getPrefixName(){
       $prefixName = Prefix::find()->asArray()->all();
       return \yii\helpers\ArrayHelper::map($prefixName, 'prefix_name', 'prefix_name');
    }

    //สร้าง dropdown list
    public static function getStaffAll(){
        $staff = Staff::find()->select(['staff_id', 'CONCAT(staff_firstname, " ",staff_lastname) as fullname'])
                              ->asArray()->all();
        return \yii\helpers\ArrayHelper::map($staff, 'staff_id', 'fullname');

    }

    //hasOne to user table
    public static function getUser(){
        return $this->hasOne(User::className,['id' => 'user_id']);
    }
}
