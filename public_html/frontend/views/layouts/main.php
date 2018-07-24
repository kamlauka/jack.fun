<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <script src="/js/jquery-3.3.1.min.js"></script>
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

            <?= Html::a(Html::img('/images/common/flag3.png',  $ru ),'/ru') ?>
            <?= Html::a(Html::img('/images/common/flag2.png',  $ch ),'/ch') ?>
            <?= Html::a(Html::img('/images/common/flag1.png',  $en ),'/en') ?>

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
                    <li><?= Html::a('Jackpot',Url::to(['/jackpot/view'])) ?></li>
                    <li><?= Html::a('Lottery',Url::to(['/lottery/view'])) ?></li>
                    <?php if (Yii::$app->user->isGuest) { ?>
                        <li><?= Html::a('Signup',false,['id'=>'sign-up','onclick'=>"showForm('.popup__registration')"]) ?></li>
                        <li><?= Html::a('Login',false, ['id'=>'sign-in','onclick'=>"showForm('.popup__login')"]) ?></li>
                    <?php } else { ?>
                        <li><?= Html::a('Cabinet',Url::to(['/cabinet/index'])) ?></li>
                        <li><?= Html::a('Logout('.Yii::$app->user->identity->username .')',Url::to(['/site/logout'])) ?></li>

                    <?php } ?>
                </ul>

            </nav>
            <div id="white-background"></div>
        </div>
    </div>

    <div class="orange-border orange-border_edge"></div>

    <div  onclick="targetFunc(event)" class="forms <?= isset(Yii::$app->params['popup']) ? 'forms_active-flex': ''?>" data="<?= isset(Yii::$app->params['popup']) ? 'activ': ''?>">

        <div class="popup forms__popup" >

            <?= \frontend\widgets\PopupForm::widget([
                'model' => isset(Yii::$app->params['login']) ? Yii::$app->params['login'] :  new \common\models\LoginForm,
                'view' => 'login'
            ]) ?>

            <?= \frontend\widgets\PopupForm::widget([
                'model' => isset(Yii::$app->params['signup']) ? Yii::$app->params['signup'] :  new \frontend\models\SignupForm,
                'view' => 'signup'
            ]) ?>

            <?= \frontend\widgets\PopupForm::widget([
                'model' => isset(Yii::$app->params['password']) ? Yii::$app->params['password'] :  new \frontend\models\PasswordResetRequestForm,
                'view' => 'passwordReset'
            ]) ?>

            <?= \frontend\widgets\PopupForm::widget([
                'model' => new \yii\base\DynamicModel(['hash' => '',]),
                'view' => 'transaction'
            ]) ?>

            <?php if(Yii::$app->session->get('winner') != 0) {
                Yii::$app->session->set('winner',0);
//                echo '<script type="text/javascript">',
//                'showForm(".popup__winner")',
//                '</script>'
//                ;
               echo \frontend\widgets\PopupForm::widget([
                    'model' => new \yii\base\DynamicModel(['phone'=>'','file'=>'']),
                    'view' => 'winner'
                ]);

            }?>

        </div>

    </div>


        <?php if(Yii::$app->controller->route != 'site/index'){ ?>
            <div class="logo-mini">
                    <div class="logo-mini__container">
                        <a href="<?= Url::to([Yii::$app->homeUrl])?>"><img src="/images/common/logo-mini.png" alt="" class="logo-mini__image"></a>
                    </div>
            </div>

        <?php } ?>


</header>
<?= Alert::widget() ?>

<?php if(Yii::$app->controller->route === 'site/index'){ ?>

<div class="preloader">
    <h1 class="preloader__title">JOLLY.BET</h1>
    <div class="preloader__fill"></div>
</div>
<?php } ?>

<div class="page-container mobile-container">

        <?php if(isset($this->params['breadcrumbs'])){?>
            <div class="crumbs container container_mob">
            <?php   echo  Breadcrumbs::widget([
                    'homeLink' => ['label' => 'Home','template' => '<li class="crumbs__link crumbs__link_home">{link}</li>', 'url' => Url::to([Yii::$app->homeUrl])],
                    'links' => $this->params['breadcrumbs'],
                ]);?>
            </div>
        <?php } ?>

    <?= $content ?>
</div>
<footer class="footer">
    <div class="footer-container footer-container_gradient">
        <div class="footer-block container  flex-gorizontal">
            <div class="footer-block__left-align-block">

                <?= Html::a('Home page',Url::to([Yii::$app->homeUrl]),['class'=>'footer-block__link footer-block__link_first']) ?>
                <?= Html::a('Lottery "Drawing of goods"',Url::to(['/lottery/view']),['class'=>'footer-block__link']) ?>

            </div>
            <div class="footer-block__center-align-block">

                <?= Html::a('Jackpot',Url::to(['/jackpot/view']),['class'=>'footer-block__link']) ?>
                <?php //echo Html::a('List of disputes','#',['class'=>'footer-block__link']) ?>
                <?php //echo Html::a('The page of the dispute','#',['class'=>'footer-block__link']) ?>

            </div>
            <div class="footer-block__right-align-block">

                <?= Html::a('Terms of agreement',Url::to(['/site/agreement']),['class'=>'footer-block__link']) ?>

                <?php if (Yii::$app->user->isGuest) { ?>
                    <?= Html::a('My Account / Login / Register',Url::to(['/site/signup']),['class'=>'footer-block__link']) ?>
                <?php } else { ?>
                    <?= Html::a('Cabinet',Url::to(['/cabinet/index']),['class'=>'footer-block__link']) ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="footer-container footer-container_dark">
        <div class="footer-block container  flex-gorizontal">
            <div class="footer-block__left-align-block footer-block__left-align-block__margin">
                <?= Html::a('www.jolly.bet','#',['class'=>'footer-block__link footer-block__link_font_gold']) ?>
            </div>
            <div class="footer-block__center-align-block">
                <a class="footer-block__icon footer-block__icon_facebook" href="#"><img src="/images/common/icon-f.svg" alt=""></a>
                <a class="footer-block__icon footer-block__icon_twitter" href="#"><img src="/images/common/icon-t.svg" alt=""></a>
                <a class="footer-block__icon footer-block__icon_insta" href="#"><img src="/images/common/icon-i.svg" alt=""></a>
                <a class="footer-block__icon footer-block__icon_google-plus" href="#"><img src="/images/common/icon-g.svg" alt=""></a>
                <a class="footer-block__icon footer-block__icon_vk" href="#"><img src="/images/common/icon-v.svg" alt=""></a>
            </div>
            <div class="footer-block__right-align-block">
                <p>38 (093) 670 670 70 </p>
<!--                <a class="footer-block__terlabs" href="http://terlabs.com">-->
<!--                    <img class="footer-block__terlabs-image"src="/images/common/terlabs.png" alt="terlabs">-->
<!--                </a>-->
<!--                <p>-->
<!--                    <span class="footer-block__terlabs-work">Создание и разработка сайтов</span>-->
<!--                    <span class="footer-block__small-number"> +38 048 789 44 54</span>-->
<!--                </p>-->
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
