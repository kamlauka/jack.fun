
<section class="jackpot-page page-container">
    <?php if($model){?>

    <div class="container container_mob mobile-container">
        <div class="crumbs">
            <a class="crumbs__link" href="#">Home</a>
            <a class="crumbs__link crumbs__link_active" href="#">Terms of Agreement</a>
        </div>

        <div class="flex-gorizontal">
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
            <div class="timer lotery-page-timer">
                <h3 class="timer__days" data = ''><span class="days timer__big-day-digit"></span> DAY</h3>
                <h3 class="timer__time timer__time_bottom" data ''><span class="hours timer__digit"></span><span class="colon">:</span>  <span class="minutes timer__digit"></span><span class="colon">:</span><span class="seconds timer__digit"></span></h3>
                <img class="lotery-page-timer__image" src="../../images/jackpot/chalice-with-money.png" alt="chalice">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <div class="cloud cloud__cloud3"></div>
                </div>
                <h3 class="timer__winning-money"> <?= $model['data']->total ?> ETH</h3>
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

        <div class="participate participate_top over-all  mobile-border ">
            <p class="participate__text"><?= $model['description']->text ?></p>

        </div>
    </div>
        <div class="clouds">
            <div class="cloud-container cloud-container_center-center-medium">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_center-left-medium">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_center-right-medium">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_border-left-medium">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
            <div class="cloud-container cloud-container_border-right-medium">
                <div class="cloud">
                    <div class="cloud cloud__cloud1"></div>
                    <div class="cloud cloud__cloud2"></div>
                    <!--<div class="cloud cloud__cloud3"></div>-->
                </div>
            </div>
        </div>

    </div>
     <?php }else{echo 'Активных джекпотов не найдено';}?>
</section>
