<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark fixed-top bg-dark',
        ],
    ]);
    $menuItems = [
        ['label' => 'หน้าแรก', 'url' => ['/site/index']],
        ['label' => 'เกี่ยวกับเรา', 'url' => ['/site/about']],
        ['label' => 'ติดต่อเรา', 'url' => ['/site/contact']],
    ];

    $menuItemRight = [];


    if (Yii::$app->user->isGuest) {
        $menuItemRight[] = ['label' => 'สมัครสมาชิก', 'url' => ['/site/signup']];
        $menuItemRight[] = ['label' => 'เข้าสู่ระบบ', 'url' => ['/site/login']];
    } else {
        $menuItemRight[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'สวัสดี (' . Yii::$app->user->identity->username . ' ออกจากระบบ)',
                ['class' => 'btn btn-link text-white logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar mr-auto'],
        'items' => $menuItems,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar ml-auto'],
        'items' => $menuItemRight,
    ]);

    NavBar::end();
    ?>
</header>

<main role="main">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => ['class' => 'mt-4'],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <?= $content ?>
</main>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?><?= date('Y') ?> | <?= Yii::$app->formatter->asDatetime('now', 'dd MMMM yyyy H:m:s') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p> version <?= Html::encode(Yii::$app->version) ?>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
