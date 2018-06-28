<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
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

            <?php
                $ru = $en = $ch = ['class' => 'flags__image'];
                if(Yii::$app->session->get('language') == 1 )
                    {Html::addCssClass($ru , ['flags__image_active']);}
                elseif(Yii::$app->session->get('language') == 2 )
                    {Html::addCssClass($en , ['flags__image_active']);
                        Html::addCssClass($en, ['btn-success', 'btn-lg']);}

                else{Html::addCssClass($ch , ['flags__image_active']);}
            ?>

            <?= Html::a(Html::img('/images/common/flag3.png',  $ru ),'/site/language?lang=ru') ?>
            <?= Html::a(Html::img('/images/common/flag2.png',  $ch ),'/site/language?lang=ch') ?>
            <?= Html::a(Html::img('/images/common/flag1.png',  $en ),'/site/language?lang=en') ?>

        </div>
        <div class="menu-container flex-gorizontal flex-gorizontal_none-vertical">
            <nav class="menu" onclick="mobileBackgroundUnderMenu()">
                <input id="link-top" type="checkbox">
                <label class="menu__down" for="link-top">
                    <div class="menu__nav">
                        <span>MENU</span>
                        <?= Html::img('/images/common/gamburger.png', ['alt' => 'hamburger menu','class' => 'menu__icon']) ?>
                    </div>
                </label>
                <ul>
                    <li><?= Html::a('Jackpot','/jackpot/view') ?></li>
                    <li><?= Html::a('Lottery','/lottery/view') ?></li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <li><?= Html::a('Signup',false,['id'=>'sign-up','onclick'=>"showForm('.popup__registration')"]) ?></li>
                        <li><?= Html::a('Login',false, ['id'=>'sign-in','onclick'=>"showForm('.popup__login')"]) ?></li>
                    <?php } else { ?>
                        <li><?= Html::a('Cabinet','/cabinet/index') ?></li>
                        <li><?= Html::a('Logout('.Yii::$app->user->identity->username .')','/site/logout') ?></li>

                    <?php } ?>
                </ul>

            </nav>
            <div id="white-background"></div>
        </div>
    </div>


    <div class="forms"  onclick="targetFunc(event)" data="<?= isset(Yii::$app->params['popup'])?Yii::$app->params['popup']: ''?>">



        <div class="popup forms__popup">

            <?= \frontend\widgets\PopupForm::widget([
                'model' => '\common\models\LoginForm',
                'view' => 'login'
            ]) ?>

            <?= \frontend\widgets\PopupForm::widget([
                'model' => '\frontend\models\SignupForm',
                'view' => 'signup'
            ]) ?>

            <?= \frontend\widgets\PopupForm::widget([
                'model' => '\frontend\models\PasswordResetRequestForm',
                'view' => 'passwordReset'
            ]) ?>

        </div>
    </div>

    <div class="logo-mini">

            <?php if(Yii::$app->controller->route === 'site/index'){?>
<!--            если главнкая то показать картинку-->
        <div class="logo__container">
                <img src="/images/common/logo.png" alt="" class="logo__image">
        </div>
                <div class="clouds clouds_fixed">
                    <div class="cloud-container cloud-container_left-big">
                        <div class="cloud">
                            <div class="cloud cloud__cloud1"></div>
                            <div class="cloud cloud__cloud2"></div>
                            <div class="cloud cloud__cloud3"></div>
                        </div>
                    </div>
                    <div class="cloud-container cloud-container_right-big">
                        <div class="cloud">
                            <div class="cloud cloud__cloud1"></div>
                            <div class="cloud cloud__cloud2"></div>
                            <div class="cloud cloud__cloud3"></div>
                        </div>
                    </div>
                    <div class="cloud-container cloud-container_bottom-scale">
                        <!--                <div class="cloud">-->
                        <!--                    <div class="cloud cloud__cloud1"></div>-->
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                        <!--                </div>-->
                    </div>
                </div>
            <?php }else{ ?>
<!--            если не главнкая то показать картинку-->
        <div class="logo-mini__container">
            <a href="/"><img src="/images/common/logo-mini.png" alt="" class="logo-mini__image"></a>
        </div>
            <?php } ?>

    </div>
    <div class="orange-border orange-border_edge"></div>
</header>
<div class="page-container mobile-container">
    <div class="crumbs container container_mob">
        <?php
        if(isset($this->params['breadcrumbs'])){

          echo  Breadcrumbs::widget([
                'homeLink' => ['label' => 'Home','template' => '<li class="crumbs__link">{link}</li>', 'url' => '/'],
                'links' => $this->params['breadcrumbs'],
            ]);

        }?>
    </div>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <footer class="footer">
        <div class="footer-container footer-container_gradient">
            <div class="footer-block container  flex-gorizontal">
                <div class="footer-block__left-align-block">

                    <?= Html::a('Home page',Yii::$app->homeUrl,['class'=>'footer-block__link footer-block__link_first']) ?>
                    <?= Html::a('Lottery "Drawing of goods"','/lottery/view',['class'=>'footer-block__link']) ?>

                </div>
                <div class="footer-block__center-align-block">
                    <?php


//                        Modal::begin([
//                            'header' => '<h2>Hello world</h2>',
//                            'toggleButton' => ['label' => 'click me'],
//                            'footer' => 'Низ окна',
//                        ]);
//
//                        echo 'Say hello...';
//
//                        Modal::end();
                    ?>
                    <?= Html::a('Jackpot','/jackpot/view',['class'=>'footer-block__link']) ?>
                    <?php //echo Html::a('List of disputes','#',['class'=>'footer-block__link']) ?>
                    <?php //echo Html::a('The page of the dispute','#',['class'=>'footer-block__link']) ?>

                </div>
                <div class="footer-block__right-align-block">

                    <?= Html::a('Terms of agreement','/site/agreement',['class'=>'footer-block__link']) ?>

                    <?php if (Yii::$app->user->isGuest) { ?>
                        <?= Html::a('My Account / Login / Register','/site/signup',['class'=>'footer-block__link']) ?>
                    <?php } else { ?>
                        <?= Html::a('Cabinet','/cabinet/index',['class'=>'footer-block__link']) ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="footer-container footer-container_dark">
            <div class="footer-block container  flex-gorizontal">
                <div class="footer-block__left-align-block footer-block__left-align-block__margin">
                    <p>38 (093) 670 670 70 </p>
                    <?= Html::a('www.jackpo.fun.com','#',['class'=>'footer-block__link footer-block__link_font_gold']) ?>
                </div>
                <div class="footer-block__center-align-block">
                    <a class="footer-block__icon footer-block__icon_facebook" href="#"><img src="/images/common/icon-f.svg" alt=""></a>
                    <a class="footer-block__icon footer-block__icon_twitter" href="#"><img src="/images/common/icon-t.svg" alt=""></a>
                    <a class="footer-block__icon footer-block__icon_insta" href="#"><img src="/images/common/icon-i.svg" alt=""></a>
                    <a class="footer-block__icon footer-block__icon_google-plus" href="#"><img src="/images/common/icon-g.svg" alt=""></a>
                    <a class="footer-block__icon footer-block__icon_vk" href="#"><img src="/images/common/icon-v.svg" alt=""></a>
                </div>
                <div class="footer-block__right-align-block">
                    <a class="footer-block__terlabs" href="http://terlabs.com">
                        <img class="footer-block__terlabs-image"src="/images/common/terlabs.png" alt="terlabs">
                    </a>
                    <p>
                        <span class="footer-block__terlabs-work">Создание и разработка сайтов</span>
                        <span class="footer-block__small-number"> +38 048 789 44 54</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>

        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
