<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Staff */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="staff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prefix_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_date_work_start')->textInput() ?>

    <?= $form->field($model, 'position_id')->textInput() ?>

    <?= $form->field($model, 'department_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_picture')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'staff_work_status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
