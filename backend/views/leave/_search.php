<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LeaveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'staff_id') ?>

    <?= $form->field($model, 'leave_year') ?>

    <?= $form->field($model, 'leave_type') ?>

    <?= $form->field($model, 'leave_day') ?>

    <?php // echo $form->field($model, 'leave_date_start') ?>

    <?php // echo $form->field($model, 'leave_date_end') ?>

    <?php // echo $form->field($model, 'leave_num') ?>

    <?php // echo $form->field($model, 'leave_reason') ?>

    <?php // echo $form->field($model, 'leave_status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
