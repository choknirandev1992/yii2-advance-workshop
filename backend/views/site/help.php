<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
$this->title = 'คู่มือใช้งาน';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
   <div class="row">
      <div class="col-md-8">
          <h3><?= Html::encode($message) ?></h3>
         <?= Html::img('@web/images/dog.jpg', ['alt' => 'หมาน้อย' ,'width'=>'200px' ])?>
         <img src="<?= Url::to('@web/images/dog.jpg') ?>" alt="หมาน้อย" width="200px">
         <p><?= $s = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem" ?></p>
         <p>byteSubstr :<?= StringHelper::byteSubstr($s, 0, 40);?></p>
         <p>truncate :<?= StringHelper::truncate($s, 40, '...');?></p>
         <hr>
         <?= 
            $number = 1234564.767;
            $formatter = Yii::$app->formatter;
            echo $formatter->asDecimal($number).'<br>';
            echo $formatter->asDecimal($number,1).'<br>';
            echo $formatter->asCurrency($number).'<br>';
            echo $formatter->asShortSize($number);
         ?>
         <div><?php echo $total ?></div>
         <ul>
         <?php    
         /*foreach($user as $users){
            ?>
               <li><?= $users ?></li>
            <?php 
         }*/
         ?>
          </ul>
   </div>     
</div>
</div>