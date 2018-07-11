<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
?>
<!--<canvas width="200" height="300" class="canvas" id="canvas"></canvas>-->
<div class="site-index">

    <?php if(Yii::$app->controller->route === 'site/index'){ ?>

        <div class="logo-mini">
            <div class="logo__container">
                <img src="/images/common/logo.png" alt="" class="logo__image">
                <img src="/images/common/logo-mini.png" alt="" class="logo-mini__image hidden">
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
        </div>
    <?php } ?>
    <h1 class="logo__text">JACKPOT<span class="logo__text_blue">.FUN</span></h1>
    <section class="first-page">

        <div class="first-page__container">
            <div class="clouds">
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
                <div class="cloud-container cloud-container_left-small" >
                    <div class="cloud">
                        <div class="cloud_bottom-big cloud cloud__cloud1"></div>
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                    </div>
                </div>
                <div class="cloud-container cloud-container_second-small">
                    <div class="cloud">
                        <div class="cloud_bottom-big cloud cloud__cloud1"></div>
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                    </div>
                </div>
                <div class="cloud-container cloud-container_third-small">
                    <div class="cloud">
                        <div class="cloud_bottom-big cloud cloud__cloud1"></div>
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                    </div>
                </div>
                <div class="cloud-container cloud-container_right-small">
                    <div class="cloud">
                        <div class="cloud_bottom-big cloud cloud__cloud1"></div>
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                    </div>
                </div>
                <div class="cloud-container cloud-container_bottom-big">
                    <div class="cloud">
                        <div class="cloud_bottom-big cloud cloud__cloud1"></div>
                        <div class="cloud cloud__cloud2"></div>
                        <div class="cloud cloud__cloud3"></div>
                    </div>
                </div>
            </div>
            <div class="currency">
                <img class="currency__image" src="../../images/main/currency-left.gif" alt="currency">
            </div>
            <div class="colons flex-gorizontal flex-gorizontal_top">
                <?php if(isset($text['T']->text)){ ?>

                <?php } if(isset($text['bitcoin']->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/bitcoinE.png', ['alt' => 'bitcoin', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['bitcoin']->text ?></p>
                    </div>
                <?php } if(isset($text['hands']->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/hands.png', ['alt' => 'hands', 'class' => 'colons__image colons__image-small']) ?>
                        </div>
                        <p class="colons__text"><?= $text['hands']->text ?></p>
                    </div>
                <?php } if(isset($text['play']->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/play.png', ['alt' => 'play', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['play']->text ?></p>
                    </div>
                <?php } if(isset($text['prize']->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/prize.png', ['alt' => 'prize', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['prize']->text ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="awarding-prizes">
        <div class="awarding-prizes__ivy awarding-prizes__ivy_left_ivy"></div>
        <div class="awarding-prizes__ivy awarding-prizes__ivy_right_ivy"></div>
        <div class="orange-border orange-border_part"></div>
        <div class="awarding-prizes__container container flex-gorizontal flex-gorizontal_none-vertical flex-gorizontal_top">
            <div class="awarding-prizes__statue statue statue_image_gift"></div>
            <div class="awarding-prizes__text">AWARDING PRIZES!</div>
            <div class="awarding-prizes__statue statue statue_image_fan"></div>
        </div>
    </section>

    <?php if(isset($lottery)){ ?>
        <section class="prizes">
            <div class="scene-of-prize flex-gorizontal">
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__one"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__two"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__three"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__four"></div>
                <div class="scene-of-prize__empty-block"></div>
                <img class="scene-of-prize__image" src="<?= $lottery['data']->img ?>" alt="iphone">
                <div class="scene-of-prize__text">
                    <h2 class="scene-of-prize__prize-name"><?= $lottery['name_prize']->text?></h2>
                    <div class="scene-of-prize__prize-price"><?= $lottery['data']->rate ?> ETH</div>
                </div>
                <div class="scene-of-prize__empty-block"></div>
            </div>
            <section class="participate participate_border_dark">
                <h3 class="participate__title">Lottery</h3>
                <div class="container flex-gorizontal">

                    <p class="participate__text participate__text_image_apple flex-gorizontal"><?= $lottery['description']->text ?></p>
                </div>
                <div class="participate__buttons container">


                    <a class="button button_gold participate__button"
                        <?php if(Yii::$app->user->isGuest) { ?>
                            onclick="showForm('.popup__login')"
                        <?php } else { ?>
                            onclick="showForm('.popup__transaction')"
                        <?php } ?>>
                        Participate</a>
                    <a class="button button_dark participate__button" href="/lottery/view">View details</a>
                </div>
            </section>
        </section>
    <?php } ?>
    <?php if(isset($jackpot)){ ?>
        <section class="jackpot">
            <div class="jackpot__cloud jackpot__cloud_one"></div>
            <div class="jackpot__cloud jackpot__cloud_two"></div>
            <div class="jackpot__sanctuary"></div>
            <div class="jackpot__cloud jackpot__cloud_five"></div>
            <div class="jackpot__cloud jackpot__cloud_three"></div>
            <div class="jackpot__cloud jackpot__cloud_four"></div>
            <div class="jackpot__cloud-container"></div>
            <div class="jackpot__cloud jackpot__cloud_six"></div>
            <div class="orange-border orange-border_all"></div>
            <div> <h2 class="title-wih-pattern jackpot__title">JACKPOT</h2></div>
            <div class="jackpot__container flex-gorizontal">
                <div class="jackpot__cloud jackpot__cloud_twenty"></div>
                <div  class="jackpot__image-block">
                    <?= Html::img('../../images/main/oh-boy.gif', ['alt' => 'oh boy', 'class' => 'jackpot__image']) ?>
                </div>

                <div class="jackpot__timer">
                    <div class="timer">

                        <h3 class="timer__days" data="<?php $datastart = explode(" ", $jackpot['data']->date_start); echo $datastart[0] ?>">
                            <span class="days timer__big-day-digit"></span> DAY
                        </h3>
                        <!--                        <h3 class="timer__time" data="--><?//=  $datastart[1] ?><!--">-->
                        <!--                            <span class="hours timer__digit"></span> :-->
                        <!--                            <span class="minutes timer__digit"></span> :-->
                        <!--                            <span class="seconds timer__digit"></span>-->
                        <!--                        </h3>s-->
                        <h3 class="timer__time" data="<?=  $datastart[1] ?>">
                            <span class="hours timer__digit"></span> :
                            <span class="minutes timer__digit"></span> :
                            <span class="seconds timer__digit"></span>
                        </h3>
                        <img class="timer__image" src="../../images/main/chalice.png" alt="chalice">
                        <h3 class="timer__winning-money"><?= $jackpot['data']->total ?> ETH</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="participate participate_border_dark">
            <div class="container">
                <h3 class="participate__title">Jackpot</h3>
                    <p class="participate__text participate__text_image_dollar flex-gorizontal"><?= $jackpot['description']->text ?></p>
            </div>
            <div class="participate__buttons container">

                <a class="button button_gold participate__button"
                    <?php if(Yii::$app->user->isGuest) { ?>
                        onclick="showForm('.popup__login')"
                    <?php } else { ?>
                        onclick="showForm('.popup__transaction')"
                    <?php } ?>>
                    Participate</a>
                <a class="button button_dark participate__button" href="/jackpot/view">View details</a>
            </div>
        </section>

    <?php } ?>

    <section class="terrestrial-world">
        <h2 class="title terrestrial-world__title"> Terrestrial world is under reconstruction</h2>
        <h3 class="subtitle terrestrial-world__subtitle">Coming soon</h3>
        <?= Html::img('../../images/main/favn.png', ['alt' => 'favn', 'class' => 'terrestrial-world__image']) ?>
    </section>
    <?php if(isset($text['seo_block_title']->text) && isset($text['seo_block_text']->text)){ ?>
        <section class="seo-section flex-gorizontal">
            <div class="seo-block container ">
                <h2 class="seo-block__title"><?= $text['seo_block_title']->text ?></h2>
                <div class="seo-block__text-container scrollbar-external_wrapper">
                    <p class="seo-block__text scrollbar-external"><?= $text['seo_block_text']->text ?></p>
                    <div class="external-scroll_y">
                        <div class="scroll-element_outer">
                            <div class="scroll-element_size"></div>
                            <div class="scroll-element_track"></div>
                            <div class="scroll-bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

</div>
