<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Staff');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <?= Html::a(Yii::t('app', 'Create Staff'), ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                   <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                   <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                           ['class' => 'yii\grid\SerialColumn'],

                           //'staff_id',
                           [
                                'attribute' => 'staff_id',
                                'value' => 'staff_id',
                                'contentOptions' => ['class' => 'text-center'],
                                'headerOptions' => ['class' => 'text-center'],

                           ],
                           //'prefix_id',
                           //'prefix.prefix_name',
                           [
                             'attribute' => 'prefix',
                             'header' => 'คำนำหน้า',
                             'value' => 'prefix.prefix_name',
                             'filter' => \backend\models\Staff::getPrefixName()
                           ],
                           [
                               'attribute' => 'ชื่อ-สกุล',
                               'value' => 'fullname',
                               'contentOptions' => [
                                  'noWrap' => true
                               ]
                           ],
                           //'staff_firstname',
                           //'staff_lastname',
                           //'staff_date_work_start',
                           //'position_id',
                           'position.name',
                           //'department_id',
                           'department.department_name',
                           //'staff_address',
                           //'staff_tel',
                           //'staff_picture',
                           //'staff_work_status',
                           [
                             'attribute' => 'staff_work_status',
                             'content' => function ($model, $key, $index, $column) {
                                 return $model->staff_work_status == 0 ? '<i class="fas fa-check"></i> ปกติ' :  '<i class="fas fa-times"></i> ลาออกแล้ว';
                             }
                           ],

                           [
                            'class' => '\hail812\adminlte3\yii\grid\ActionColumn',
                            'header' => 'เครื่องมือ',
                            'headerOptions' => ['width' => '150', 'class' => 'text-center'],
                            'contentOptions' => ['class' => 'text-center'],
                            'template' => '{view} {update} {delete}',
                            'buttons' => [
                                'view' => function($url, $model){

                                     return Html::a('<i class="fas fa-info-circle"></i>' , $url, ['title' => 'ดูรายละเอียด']);

                                },
                                'delete' => function($url, $model){

                                    return Html::a('<i class="fas fa-trash-alt"></i>' , $url, 
                                         [
                                            'title' => 'ดูรายละเอียด', 
                                            'data' => ['confirm' => 'แน่ใจว่าต้องการลบรายการนี้?'. $model->fullname, 'method' => 'post'],
                                            'class' => ['mx-3 text-danger']
                                         ]);
                               }
                            ]
                         ],
                            
                            ],
                            'summaryOptions' => ['class' => 'summary mt-2 mb-2'],
                            'pager' => [
                                'class' => 'yii\bootstrap4\LinkPager',
                            ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
