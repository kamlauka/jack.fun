<?php
    $this->params['breadcrumbs'][] = ['label' =>'Jackpot','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>

    <?php if($model){?>


<section class="prize-page">
    <div class="prize-page-without-clouds prize-container container_mob mobile-container">
        <div class="jackpot-flex-gorizontal">
            <div class="participate participate_bottom participate_top mobile-border ">
                <div class="algorithm">
                    <span class="algorithm__number algorithm__number_position-left">I</span>
                    <img class="algorithm__image" src="../../../images/jackpot/procent.png" alt="percents">
                    <h3 class="participate__title"><?= Yii::t('jackpot','Lorem Ipsum is text') ?></h3>
                    <p class="participate__text participate__text_nomargin"><?php if(isset($model['text_1']->text))echo $model['text_1']->text ?></p>
                </div>
                <div class="algorithm">
                    <span class="algorithm__number algorithm__number_position-left">II</span>
                    <img class="algorithm__image" src="../../../images/jackpot/hand.png" alt="hand">
                    <h3 class="participate__title"><?= Yii::t('jackpot','Lorem Ipsum is text') ?></h3>
                    <p class="participate__text participate__text_nomargin"><?php if(isset($model['text_2']->text))echo $model['text_2']->text ?></p>
                </div>
            </div>
            <div class="timer jackpot-page-timer">
                <div class="jackpot-page-timer__container">
                    <h3 class="timer__days" data="<?php $datastart = explode(" ", $model['data']->date_start); echo $datastart[0] ?>"><span class="days timer__big-day-digit"></span> DAY</h3>
                    <h3 class="timer__time timer__time_bottom" data="<?=  $datastart[1] ?>"><span class="hours jackpot-page-timer__times"></span><span class="colon">:</span>  <span class="minutes jackpot-page-timer__times"></span><span class="colon">:</span><span class="seconds jackpot-page-timer__times"></span></h3>
                    <img class="jackpot-page-timer__image" src="../../../images/jackpot/chalice-with-money.png" alt="chalice">
                    <h3 class="timer__winning-money"> <?= $model['data']->total ?> ETH</h3>
                    <div class="cloud-container cloud-container_mobile">
                        <div class="cloud">
                            <!--<div class="cloud cloud__cloud1"></div>-->
                            <!--<div class="cloud cloud__cloud2"></div>-->
                            <!--<div class="cloud cloud__cloud3"></div>-->
                        </div>
                    </div>
                </div>

            </div>

            <div class="participate  participate_bottom participate_top participate__second">
                <div class="algorithm algorithm_right-background">
                    <span class="algorithm__number algorithm__number_position-right">III</span>
                    <img class="algorithm__image" src="../../../images/jackpot/clock.png" alt="clock">
                    <h3 class="participate__title"><?= Yii::t('jackpot','Lorem Ipsum is text') ?></h3>
                    <p class="participate__text participate__text_nomargin"><?php if(isset($model['text_3']->text)) echo $model['text_3']->text ?></p>
                </div>
                <div class="algorithm algorithm_right-background">
                    <span class="algorithm__number algorithm__number_position-right">IV</span>

                    <img class="algorithm__image" src="../../../images/jackpot/purse.png" alt="purse">
                    <h3 class="participate__title"><?= Yii::t('jackpot','Lorem Ipsum is text') ?></h3>
                    <p class="participate__text participate__text_nomargin"><?php if(isset($model['text_4']->text))echo $model['text_4']->text  ?></p>
                </div>
            </div>
        </div>
        <div class="clouds clouds_bottom clouds_over-all">
<!--            <div class="cloud-container cloud-container_left-bottom-jackpot">-->
<!--                <div class="cloud">-->
<!--                    <!--<div class="cloud cloud__cloud1"></div>-->
<!--                    <!--<div class="cloud cloud__cloud2"></div>-->
<!--                    <!--<div class="cloud cloud__cloud3"></div>-->
<!--                </div>-->
<!--            </div>-->
            <div class="cloud-container cloud-container_left-middle-jackpot">
                <div class="cloud">
                    <!--<div class="cloud cloud__cloud1"></div>-->
                    <!--<div class="cloud cloud__cloud2"></div>-->
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_center-middle-jackpot">
                <div class="cloud">
                    <!--<div class="cloud cloud__cloud1"></div>-->
                    <!--<div class="cloud cloud__cloud2"></div>-->
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_right-bottom-middle-jackpot">
                <div class="cloud">
                    <!--<div class="cloud cloud__cloud1"></div>-->
                    <!--<div class="cloud cloud__cloud2"></div>-->
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
<!--            <div class="cloud-container cloud-container_right-bottom-jackpot">-->
<!--                <div class="cloud">-->
<!--                    <!--<div class="cloud cloud__cloud1"></div>-->
<!--                    <!--<div class="cloud cloud__cloud2"></div>-->
<!--                    <!--<div class="cloud cloud__cloud3"></div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

        <div class="participate over-all  mobile-border container ">

            <h3 class="participate__title"><?= Yii::t('jackpot','Lorem Ipsum is text') ?>/h3>
            <p class="participate__text participate__text_nomargin"><?= $model['description']->text ?></p>
<br>
        </div>


     <?php }else{echo 'No active jackpots';}?>
    </div>
<<<<<<< HEAD
    <div class="clouds">
        <div class="cloud-container cloud-container_center-center-medium">
            <canvas class="canvas"></canvas>

        </div>
        <div class="cloud-container cloud-container_center-page">
            <canvas class="canvas canvas_large"></canvas>

=======
    <div class="clouds clouds_all">
        <div class="cloud-container cloud-container_center-page">
            <canvas class="canvas canvas_large"></canvas>

        </div>
        <div class="cloud-container cloud-container_center-center-medium">
            <canvas class="canvas"></canvas>
>>>>>>> as
        </div>
<!---->
<!--        <div class="cloud-container cloud-container_center-left-medium">-->
<!--            <canvas class="canvas"></canvas>-->
<!--        </div>-->
<!--        <div class="cloud-container cloud-container_center-right-medium">-->
<!--            <canvas class="canvas"></canvas>-->
<!--        </div>-->
<!--        <div class="cloud-container cloud-container_border-left-medium">-->
<!--            <canvas class="canvas"></canvas>-->
<!--        </div>-->
<!--        <div class="cloud-container cloud-container_border-right-medium">-->
<!--            <canvas class="canvas"></canvas>-->
<!--        </div>-->
        <div class="cloud-container cloud-container_center-left-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_center-right-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_border-left-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_border-right-medium">
            <canvas class="canvas"></canvas>
        </div>
    </div>
</section>