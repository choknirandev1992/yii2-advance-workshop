<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=\yii\helpers\Url::home()?>" class="brand-link">
        <img src="<?=$assetDir?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">สวัสดีคุณ <?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            echo \hail812\adminlte3\widgets\Menu::widget([
                'items' => [
                    ['label' => 'ข้อมูลหลัก', 'header' => true],
                    ['label' => 'ตำแหน่ง', 'icon' => 'user', 'url' => ['/position/index']],
                    ['label' => 'แผนก', 'icon' => 'address-card', 'url' => ['/department/index']],
                    ['label' => 'คำนำหน้า', 'icon' => 'address-book', 'url' => ['/prefix/index']],
                    ['label' => 'พนักงาน', 'icon' => 'user', 'url' => ['/staff/index']],
                    ['label' => 'จัดการการลา', 'icon' => 'file', 'url' => ['/leave/index']],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>