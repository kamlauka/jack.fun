<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<header class="header">

    <div class="header__container container flex-gorizontal flex-gorizontal_none-vertical">
        <div class="flags flex-gorizontal flex-gorizontal_none-vertical">
            <?= Html::img('/images/flag3.png', ['alt' => 'Chinese', 'class' => 'flags__image']) ?>
            <?= Html::img('/images/flag2.png', ['alt' => 'Russian', 'class' => 'flags__image']) ?>
            <?= Html::img('/images/flag1.png', ['alt' => 'English', 'class' => 'flags__image']) ?>
        </div>
        <div class="menu-container flex-gorizontal flex-gorizontal_none-vertical">
            <nav class="menu" onclick="openbox('white-background')">
                <input id="link-top" type="checkbox">
                <label class="menu__down" for="link-top">
                    <div class="menu__nav">
                        <span>MENU</span>
                        <?= Html::img('/images/gamburger.png', ['alt' => 'hamburger menu','class' => 'menu__icon']) ?>
                    </div>
                </label>
                <ul>
                    <li><?= Html::a('Jackpot','/jackpot/index') ?></li>
                    <li><?= Html::a('Lottery','/lottery/index') ?></li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <li><?= Html::a('Signup','/site/signup') ?></li>
                        <li><?= Html::a('Login','/site/login') ?></li>
                    <?php } else { ?>
                        <li><?= Html::a('Cabinet','/cabinet/index') ?></li>
                        <li><?= Html::a('Logout('.Yii::$app->user->identity->username .')','/site/logout') ?></li>

                    <?php } ?>
                </ul>
                <div id="white-background"></div>
            </nav>
        </div>
    </div>
    <div class="orange-border orange-border_edge"></div>
</header>
<div class="wrap">


        <?= Alert::widget() ?>
        <?= $content ?>

    <footer class="footer">
        <div class="footer-container footer-container_gradient">
            <div class="footer-block container  flex-gorizontal">
                <div class="footer-block__left-align-block">

                    <?= Html::a('Home page',Yii::$app->homeUrl,['class'=>'footer-block__link footer-block__link_first']) ?>
                    <?= Html::a('Lottery "Drawing of goods"','/lottery/index',['class'=>'footer-block__link']) ?>

                </div>
                <div class="footer-block__center-align-block">

                    <?= Html::a('List of disputes','#',['class'=>'footer-block__link']) ?>
                    <?= Html::a('The page of the dispute','#',['class'=>'footer-block__link']) ?>

                </div>
                <div class="footer-block__right-align-block">

                    <?= Html::a('Terms of agreement','/site/agreement',['class'=>'footer-block__link']) ?>
                    <?= Html::a('My Account / Login / Register','/site/signup',['class'=>'footer-block__link']) ?>

                </div>
            </div>
        </div>
        <div class="footer-container footer-container_dark">
            <div class="footer-block container  flex-gorizontal">
                <div class="footer-block__left-align-block footer-block__left-align-block__margin">
                    <p>38 (093) 670 670 70 </p>
                    <a class="footer-block__link footer-block__link_font_gold" href="#">www.jackpo.fun.com</a>
                </div>
                <div class="footer-block__center-align-block">
                    <a class="footer-block__icon" href="#"><img src="/images/icon-f.svg" alt=""></a>
                    <a class="footer-block__icon" href="#"><img src="/images/icon-t.svg" alt=""></a>
                    <a class="footer-block__icon" href="#"><img src="/images/icon-i.svg" alt=""></a>
                    <a class="footer-block__icon" href="#"><img src="/images/icon-g.svg" alt=""></a>
                    <a class="footer-block__icon" href="#"><img src="/images/icon-v.svg" alt=""></a>
                </div>
                <div class="footer-block__right-align-block">
                    <a class="footer-block__terlabs" href="http://terlabs.com">
                        <img class="footer-block__terlabs-image"src="/images/terlabs.png" alt="terlabs">
                    </a>
                    <p>
                        <span class="footer-block__terlabs-work">Создание и разработка сайтов</span>
                        <span class="footer-block__small-number"> +38 048 789 44 54</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div>
        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
