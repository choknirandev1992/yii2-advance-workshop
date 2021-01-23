<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Department */

$this->title = Yii::t('app', 'Update Department: {name}', [
    'name' => $model->department_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->department_id, 'url' => ['view', 'id' => $model->department_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="container-fluid">
<div class="department-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>