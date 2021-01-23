<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'เกี่ยวกับเรา';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php']);
?>


<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>

    <?= Html::a('กลับหน้าแรก', Yii::$app->urlManagerFrontEnd->getbaseUrl()) ?>
</div>
