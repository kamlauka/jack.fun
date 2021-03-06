<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
            'brandLabel' => 'Control Panel',
            'brandUrl' => $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"],
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],

    ]);
    $menuItems = [
        ['label' => 'Clear cache |', 'url' => ['/site/clear-cache']],

    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

    } else {
        if (\Yii::$app->user->can('admin')) {
            $menuItems[] = ['label' => 'SetWinner', 'url' => ['/winner/set-winner-lottery']];
        }
        $menuItems[] = ['label' => 'Log', 'url' => ['/log/index']];
        $menuItems[] = ['label' => 'Translations', 'url' => ['/translation/index']];
        $menuItems[] = ['label' => 'Lottery', 'url' => ['/lottery/index']];
        $menuItems[] = ['label' => 'Disputes', 'url' => ['/dispute/index']];
        $menuItems[] = ['label' => 'Jackpots', 'url' => ['/jackpot/index']];
        $menuItems[] = ['label' => 'Users', 'url' => ['/user/index']];
        $menuItems[] = ['label' => 'Settings', 'url' => ['/modification/index']];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?php
            if (!Yii::$app->user->isGuest) {
                echo
                    Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]);
            }
        ?>

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><a href='https://terlabs.com'>TERLABS.COM</a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
