<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
$this->title = 'ตำแหน่ง';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?= $count ?> รายการ
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ตำแหน่ง</th>
                            <th>เครื่องมือ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($positions as $position) : ?>
                            <tr>
                                <th scope="row"><?=Html::encode($position['id']) ?></th>
                                <td><?=Html::encode($position['name']) ?></td>
                                <td>
                                  <a href="<?= Url::to(['position/delete','id' => Html::encode($position['id'])]) ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                         <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
      </div>     
    </div>
</div>