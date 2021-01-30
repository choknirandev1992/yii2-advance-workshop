<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leave */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="leave-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_id')->dropdownList(\backend\models\Staff::getStaffAll(),['prompt' => 'เลือกพนักงาน']) ?>

    <?= $form->field($model, 'leave_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'leave_type')->radioList([ 
          'ลาป่วย' => 'ลาป่วย',
          'ลากิจ' => 'ลากิจ', 
          'ลาพักร้อน' => 'ลาพักร้อน'
     ]) ?>

    <?= $form->field($model, 'leave_day')->radioList([ 
          'เต็มวัน' => 'เต็มวัน',
          'ครึ่งเช้า' => 'ครึ่งเช้า', 
          'ครึ่งบ่าย' => 'ครึ่งบ่าย'
     ]) ?>

    <?= $form->field($model, 'leave_date_start')->textInput() ?>

    <?= $form->field($model, 'leave_date_end')->textInput() ?>


    <?= $form->field($model, 'leave_reason')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'leave_status')->radioList([ 
          '0' => 'ยังไม่อนุมัติ',
          '1' => 'อนุมัติ', 
     ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
