<?php
    $this->params['breadcrumbs'][] = ['label' =>'Jackpot','template' => "<li class='crumbs__link crumbs__link_active'><span class='crumb-active'>{link}</span></li>"];
?>

    <?php if($model){?>


<section class="prize-page">
    <div class="prize-page-without-clouds prize-container container_mob mobile-container">
        <div class="jackpot-flex-gorizontal">
            <div class="participate participate_bottom participate_top mobile-border ">
                <div class="algorithm">
                    <span class="algorithm__number algorithm__number_position-left">I</span>
                    <img class="algorithm__image" src="../../images/jackpot/procent.png" alt="percents">
                    <p class="algorithm__text"><?php if(isset($model['text_1']->text))echo $model['text_1']->text ?></p>
                </div>
                <div class="algorithm">
                    <span class="algorithm__number algorithm__number_position-left">II</span>
                    <img class="algorithm__image" src="../../images/jackpot/hand.png" alt="hand">
                    <p class="algorithm__text"><?php if(isset($model['text_2']->text))echo $model['text_2']->text ?></p>
                </div>
            </div>
            <div class="timer jackpot-page-timer">
                <div class="jackpot-page-timer__container">
                    <h3 class="timer__days" data="<?php $datastart = explode(" ", $model['data']->date_start); echo $datastart[0] ?>"><span class="days timer__big-day-digit"></span> DAY</h3>
                    <h3 class="timer__time timer__time_bottom" data="<?=  $datastart[1] ?>"><span class="hours jackpot-page-timer__times"></span><span class="colon">:</span>  <span class="minutes jackpot-page-timer__times"></span><span class="colon">:</span><span class="seconds jackpot-page-timer__times"></span></h3>
                    <img class="jackpot-page-timer__image" src="../../images/jackpot/chalice-with-money.png" alt="chalice">
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
                    <img class="algorithm__image" src="../../images/jackpot/clock.png" alt="clock">
                    <p class="algorithm__text"><?php if(isset($model['text_3']->text)) echo $model['text_3']->text ?></p>
                </div>
                <div class="algorithm algorithm_right-background">
                    <span class="algorithm__number algorithm__number_position-right">IV</span>
                    <img class="algorithm__image" src="../../images/jackpot/purse.png" alt="purse">
                    <p class="algorithm__text"><?php if(isset($model['text_4']->text))echo $model['text_4']->text  ?></p>
                </div>
            </div>
        </div>
        <div class="clouds clouds_bottom clouds_over-all">
            <div class="cloud-container cloud-container_left-bottom-jackpot">
                <div class="cloud">
                    <!--<div class="cloud cloud__cloud1"></div>-->
                    <!--<div class="cloud cloud__cloud2"></div>-->
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
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
            <div class="cloud-container cloud-container_right-bottom-jackpot">
                <div class="cloud">
                    <!--<div class="cloud cloud__cloud1"></div>-->
                    <!--<div class="cloud cloud__cloud2"></div>-->
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
        </div>

        <div class="participate over-all  mobile-border container ">
            <p class="participate__text"><?= $model['description']->text ?></p>

        </div>


     <?php }else{echo 'Активных джекпотов не найдено';}?>
    </div>
    <div class="clouds">
        <div class="cloud-container cloud-container_center-center-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_center-left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_center-right-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_border-left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_border-right-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
    </div>
</section>