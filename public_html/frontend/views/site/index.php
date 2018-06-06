<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
?>
<div class="site-index">

    <section class="first-page">

        <div class="parallax">
            <div class="parallax-base" data-paroller-factor="0.9" data-paroller-type="foreground" data-paroller-direction="vertical">
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
            </div>

            <div class="parallax-back" data-paroller-factor="0.1" data-paroller-type="foreground">
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
        </div>

         <div class="first-page__container">
            <div class="parallax-top" data-paroller-factor="-0.1" data-paroller-type="foreground" data-paroller-direction="vertical">
                <div class="logo">
                    <?= Html::img('images/logo_mobile.png', ['alt' => 'jackpot logotype mobile', 'class' => 'logo__picture_mobile']) ?>
                                       <!--<div class="logo__logo"></div>-->
                    <h1 class="logo__text">JACKPOT<span class="logo__text_blue">.FUN</span></h1>
                </div>
            </div>
            <div class="currency">
                <?= Html::img('../../images/currency.gif', ['alt' => 'currency', 'class' => 'currency__image']) ?>
            </div>
            <div class="colons flex-gorizontal flex-gorizontal_top">
                <?php if(isset($T->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/tt.png', ['alt' => 'T', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $T->text ?></p>
                    </div>
                <?php } if(isset($bitcoin->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/bitcoin.png', ['alt' => 'bitcoin', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $bitcoin->text ?></p>
                    </div>
                <?php } if(isset($hands->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/hands.png', ['alt' => 'hands', 'class' => 'colons__image colons__image-small']) ?>
                        </div>
                        <p class="colons__text"><?= $hands->text ?></p>
                    </div>
                <?php } if(isset($play->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/play.png', ['alt' => 'play', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $play->text ?></p>
                    </div>
                <?php } if(isset($prize->text)){ ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/prize.png', ['alt' => 'prize', 'class' => 'colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $prize->text ?></p>
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
            <img class="scene-of-prize__image" src="<?= $lottery->img ?>" alt="iphone">
            <div class="scene-of-prize__text">
                <h2 class="scene-of-prize__prize-name"><?= $lottery_name_prize->text ?></h2>
                <div class="scene-of-prize__prize-price"><?= $lottery->rate ?> ETH</div>
            </div>
            <div class="scene-of-prize__empty-block"></div>
        </div>
        <section class="participate participate_border_dark">
            <div class="container flex-gorizontal">
                <p class="participate__text participate__text_image_apple flex-gorizontal"><?= $lottery_description->text ?></p>
            </div>
            <div class="participate__buttons container">
                <a class="button button_gold participate__button" href="/lottery/view?id=<?= $lottery->id ?>">Participate</a>
            </div>
        </section>
    </section>
    <?php } ?>
    <?php if($jackpot){ ?>
        <section class="lotery">
            <div class="lotery__cloud lotery__cloud_one"></div>
            <div class="lotery__cloud lotery__cloud_two"></div>
            <div class="lotery__sanctuary"></div>
            <div class="lotery__cloud lotery__cloud_five"></div>
            <div class="lotery__cloud lotery__cloud_three"></div>
            <div class="lotery__cloud lotery__cloud_four"></div>
            <div class="lotery__cloud-container"></div>
            <div class="lotery__cloud lotery__cloud_six"></div>
            <div class="orange-border orange-border_all"></div>
            <div> <h2 class="title-wih-pattern lotery__title">JECKPOT</h2></div>
            <div class="lotery__container flex-gorizontal">
                <div class="lotery__cloud lotery__cloud_twenty"></div>
                <div  class="lotery__image-block">
                  <?= Html::img('../../images/oh-boy.gif', ['alt' => 'oh boy', 'class' => 'lotery__image']) ?>
                </div>

                <div class="lotery__timer">
                    <div class="timer">

                        <h3 class="timer__days" data="<?php $datastart = explode(" ", $jackpot->date_start); echo $datastart[0] ?>">
                            <span class="days timer__big-day-digit"></span> DAY
                        </h3>
                        <h3 class="timer__time" data="<?=  $datastart[1] ?>">
                            <span class="hours timer__digit"></span> :
                            <span class="minutes timer__digit"></span> :
                            <span class="seconds timer__digit"></span>
                        </h3>
                        <img class="timer__image" src="../../images/chalice.png" alt="chalice">
                        <h3 class="timer__winning-money"><?= $jackpot->total ?> ETH</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="participate participate_border_dark">
            <div class="container flex-gorizontal">
                <p class="participate__text participate__text_image_dollar flex-gorizontal"><?= $jackpot_description->text ?></p>
            </div>
            <div class="participate__buttons container">
                <a class="button button_gold participate__button" href="/jackpot/view?id=<?= $jackpot->id ?>">Participate</a>
            </div>
        </section>

    <?php } ?>

    <section class="terrestrial-world">
        <h2 class="title terrestrial-world__title"> Terrestrial world is under reconstruction</h2>
        <h3 class="subtitle terrestrial-world__subtitle">Coming soon</h3>
        <?= Html::img('../../images/favn.png', ['alt' => 'favn', 'class' => 'terrestrial-world__image']) ?>
    </section>
    <?php if(isset($seo_block_title->text) && isset($seo_block_text->text)){ ?>
    <section class="seo-section flex-gorizontal">
        <div class="seo-block container">
            <h2 class="seo-block__title"><?= $seo_block_title->text ?></h2>
            <p class="seo-block__text scrolling"><?= $seo_block_text->text ?></p>
        </div>
    </section>
    <?php } ?>

</div>
