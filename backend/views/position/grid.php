<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\bootstrap4\LinkPager;

$this->title = 'ตำแหน่ง';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= $dataProvider->totalCount ?> รายการ
            </div>
            <div class="card-body">
               <?= 
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            'id',
                            'name'
                        ],
                        'pager' => ['class' => LinkPager::className() ] 
                    ])
               ?>
            </div>
        </div>
      </div>     
    </div>
</div>