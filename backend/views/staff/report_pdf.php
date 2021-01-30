<?php
use yii\grid\GridView;
?>
<div style="font-family: sarabunnew;">
    <h2 class="text-center">รายงานพนักงาน <?= $dataProvider->getTotalCount() ?> คน</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'staff_id',
            'staff_firstname',
            'staff_lastname'
        ]
    ]); ?>
</div>