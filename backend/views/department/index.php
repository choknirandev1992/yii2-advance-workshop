<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="department-index">
    <p>
        <?= Html::a(Yii::t('app', 'Create Department'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'department_id',
            [
                'attribute' => 'department_id',
                'options' => ['width' => '100'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            'department_name',
            [
               'class' => '\hail812\adminlte3\yii\grid\ActionColumn',
               'header' => 'เครื่องมือ',
               'headerOptions' => ['width' => '150', 'class' => 'text-center'],
               'contentOptions' => ['class' => 'text-center'],
               'template' => '{view} {update} {delete}'
            ],
        ],
        'pager' => [
            'class' => '\yii\bootstrap4\LinkPager'
        ]
    ]); ?>

    <?php Pjax::end(); ?>
</div>
</div>
