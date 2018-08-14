<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

//$this->title = 'My Yii Application';
?>
<!--<div class="lazy" data-loader="customLoaderName"></div>-->
<!--<div class="lazy" data-loader="customLoaderName"></div>-->
<!--<div class="lazy" data-loader="customLoaderName"></div>-->
<!--<div class="lazy" data-loader="customLoaderName"></div>-->
<!--<img class="lazy" data-src="http://jquery.eisbehr.de/lazy/images/1.jpg?t=1533409355" />-->
<!--<img class="lazy" data-src="http://jquery.eisbehr.de/lazy/images/1.jpg?t=1533409355" />-->
<!--<div class="canvas-container">-->
<!--    <canvas class="canvas" id="canvas"></canvas>-->
<!--</div>-->
<!--<div class="canvas-container">-->
<!--    <canvas class="canvas"></canvas>-->
<!--    <canvas class="canvas"></canvas>-->
<!--</div>-->
<div class="site-index">

    <?php if ($dd = Yii::$app->controller->route === 'page/index') { ?>

        <div class="lazy logo-mini" data-loader="customLoaderName">
            <div class="logo__container">
                <img src="/images/common/logo.png" alt="" class="lazy logo__image">
                <img src="/images/common/logo-mini.png" alt="" class="logo-mini__image hidden">
            </div>

            <div class="clouds clouds_fixed">
                <div class="cloud-container cloud-container_left-big">
                    <canvas class="canvas canvas_middle"></canvas>
                </div>
                <div class="cloud-container cloud-container_right-big">
                    <canvas class="canvas canvas_middle"></canvas>
                </div>
                <div class="cloud-container cloud-container_bottom-scale">
                    <div class="cloud cloud__cloud2"></div>
                </div>
            </div>
        </div>
    <?php } ?>
    <h1 class="lazy logo__text" data-loader="customLoaderName">JOLLY<span class="logo__text_blue">.BET</span></h1>
    <section class="lazy  first-page" data-loader="customLoaderName">

        <div class="first-page__container">
            <div class="clouds">
                <div class="cloud-container cloud-container_left-big">
                    <canvas class="canvas canvas_middle"></canvas>
                </div>
                <div class="cloud-container cloud-container_right-big">
                    <canvas class="canvas canvas_middle"></canvas>
                </div>
                <div class="cloud-container cloud-container_left-small">
                    <canvas class="canvas canvas_small"></canvas>
                </div>
                <div class="cloud-container cloud-container_second-small">
                    <canvas class="canvas canvas_small"></canvas>
                </div>
                <div class="cloud-container cloud-container_third-small">
                    <canvas class="canvas canvas_small"></canvas>
                </div>
                <div class="cloud-container cloud-container_right-small">
                    <canvas class="canvas canvas_small"></canvas>
                </div>
                <div class="cloud-container cloud-container_bottom-big">
                    <div class="cloud"></div>
                </div>
            </div>
            <h1 class="logo-text-mobile">JACKPOT.FUN</h1>
            <div class="currency">
                <img class="lazy currency__image" data-src="../../images/main/currency-left.gif" alt="currency">
            </div>
            <div class="colons flex-gorizontal flex-gorizontal_top">
                <?php if (isset($text['T']->text)) { ?>

                <?php }
                if (isset($text['bitcoin']->text)) { ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/bitcoinE.png', ['alt' => 'bitcoin', 'class' => 'lazy colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['bitcoin']->text ?></p>
                    </div>
                <?php }
                if (isset($text['hands']->text)) { ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/hands.png', ['alt' => 'hands', 'class' => 'lazy colons__image colons__image-small']) ?>
                        </div>
                        <p class="colons__text"><?= $text['hands']->text ?></p>
                    </div>
                <?php }
                if (isset($text['play']->text)) { ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/play.png', ['alt' => 'play', 'class' => 'lazy colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['play']->text ?></p>
                    </div>
                <?php }
                if (isset($text['prize']->text)) { ?>
                    <div class="colons__item">
                        <div class="colons__image-container">
                            <?= Html::img('../../images/main/prize.png', ['alt' => 'prize', 'class' => 'lazy colons__image']) ?>
                        </div>
                        <p class="colons__text"><?= $text['prize']->text ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <section class="lazy awarding-prizes" data-loader="customLoaderName">
        <div class="awarding-prizes__ivy awarding-prizes__ivy_left_ivy"></div>
        <div class="awarding-prizes__ivy awarding-prizes__ivy_right_ivy"></div>
        <div class="orange-border orange-border_part"></div>
        <div class="awarding-prizes__container container flex-gorizontal flex-gorizontal_none-vertical flex-gorizontal_top">
            <div class="awarding-prizes__statue statue statue_image_gift"></div>
            <div class="awarding-prizes__text">AWARDING PRIZES!</div>
            <div class="awarding-prizes__statue statue statue_image_fan"></div>
        </div>
    </section>

    <?php if (isset($lottery)) { ?>
        <section class="lazy prizes" data-loader="customLoaderName">
            <div class="scene-of-prize flex-gorizontal">
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__one"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__two"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__three"></div>
                <div class="scene-of-prize__cloud-rotate scene-of-prize__cloud-rotate__four"></div>
                <div class="scene-of-prize__empty-block"></div>
                <img class="lazy scene-of-prize__image" data-src="<?= $lottery['data']->img ?>" alt="iphone">
                <div class="scene-of-prize__text">
                    <h2 class="scene-of-prize__prize-name"><?= isset($lottery['name_prize']->text)?$lottery['name_prize']->text:'' ?></h2>
                    <div class="scene-of-prize__prize-price"><?= $lottery['data']->rate ?> ETH</div>
                </div>
                <div class="scene-of-prize__empty-block"></div>
            </div>
            <section class="participate participate_border_dark">
                <h3 class="participate__title">Lottery</h3>
                <div class="container flex-gorizontal">

                    <p class="participate__text participate__text_image_apple flex-gorizontal"><?= isset($lottery['description']->text)?$lottery['description']->text:'' ?></p>
                </div>

                    <?php if(!Yii::$app->user->isGuest && $lottery['user_transaction_hash'] != null ){
                        echo ' <div class="prize-money participate__bet-money"><p class="participate__bet-subtitle" >Your bet is excepted</p> <p class="participate__bet-hash" >hash: <br>'. $lottery['user_transaction_hash']->hash.'</p></div>';
                    }else{ ?>


                <div class="participate__buttons container">
                        <a class="button button_gold participate__button"
                            <?php if (Yii::$app->user->isGuest) { ?>
                                 onclick="showForm('.popup__login')"
                            <?php } else { ?>
                                 onclick="showForm('.popup__transaction')"
                            <?php } ?>>
                        Participate</a>
                    <?php } ?>
                    <?= Html::a('View details',Url::to(['/lottery/view']),['class'=>'button button_dark participate__button']) ?>
                </div>
            </section>
        </section>
        <div class="lazy orange-border orange-border_all" data-loader="customLoaderName"></div>
    <?php } ?>
    <?php if (isset($jackpot)) { ?>
        <section class="lazy jackpot" data-loader="customLoaderName">
            <div class="jackpot__cloud jackpot__cloud_one"></div>
            <div class="jackpot__cloud jackpot__cloud_two"></div>
            <div class="jackpot__sanctuary"></div>
            <div class="jackpot__cloud jackpot__cloud_five"></div>
            <div class="jackpot__cloud jackpot__cloud_three"></div>
            <div class="jackpot__cloud jackpot__cloud_four"></div>
            <div class="jackpot__cloud-container"></div>
            <div class="jackpot__cloud jackpot__cloud_six"></div>

            <div><h2 class="title-wih-pattern jackpot__title">JACKPOT</h2></div>
            <div class="jackpot__container flex-gorizontal">
                <div class="jackpot__cloud jackpot__cloud_twenty"></div>
                <div class="jackpot__image-block">
                    <?= Html::img('../../images/main/oh-boy.gif', ['alt' => 'oh boy', 'class' => 'lazy jackpot__image']) ?>
                </div>

                <div class="jackpot__timer">
                    <div class="timer">

                        <h3 class="timer__days" data="<?php $datastart = explode(" ", $jackpot['data']->date_start);
                        echo $datastart[0] ?>">
                            <span class="days timer__big-day-digit"></span> DAY
                        </h3>
                        <h3 class="timer__time" data="<?= $datastart[1] ?>">
                            <span class="hours timer__digit"></span> :
                            <span class="minutes timer__digit"></span> :
                            <span class="seconds timer__digit"></span>
                        </h3>
                        <img class="lazy timer__image" data-src="../../images/main/chalice.png" alt="chalice">
                        <h3 class="timer__winning-money"><?= $jackpot['data']->total ?> ETH</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="lazy participate participate_border_dark" data-loader="customLoaderName">
            <div class="container">

                <h3 class="participate__title">Jackpot</h3>
                <p class="participate__text participate__text_image_dollar flex-gorizontal"><?= $jackpot['description']->text ?></p>

            </div>
            <div class="participate__buttons container">
                <?= Html::a('View details',Url::to(['/jackpot/view']),['class'=>'button button_dark participate__button']) ?>
            </div>
        </section>

    <?php } ?>

    <section class="lazy disputes-main-page">
        <h2 class="disputes-main-page__title">Disputes</h2>
        <div class="container">
            <div class="infographic">
                <div class="infographic__cloud">
                    <div class="infographic__container">
                        <img class="infographic__picture" src="../images/common/disputestone.png" alt="">
                        <img class="infographic__picture dispute-door" src="../images/common/disputedoor.png" alt="">
                    </div>

                    <div class="infographic__container">
                        <span class="infographic__text">create dispute</span>
                        <span class="or">or</span>
                        <span class="infographic__text">enter into an existing dispute</span>
                    </div>
                </div>
                <img class="infographic__arrow infographic__arrow_rotate_first" src="../images/common/clarrow.png">

                <div class="infographic__cloud infographic__cloud_top">
                    <div class="infographic__container">
                        <img class="infographic__picture" src="../images/common/man2.png" alt="">
                        <img class="infographic__picture" src="../images/common/man1.png" alt="">
                    </div>
                    <div class="infographic__container">
                        <span class="infographic__text">fulfill the condition</span>
                        <span class="or">or</span>
                        <span class="infographic__text">see how your conditions are fulfilled</span>
                    </div>

                </div>
                <img class="infographic__arrow infographic__arrow_rotate_second" src="../images/common/clarrow2.png">
                <div class="infographic__cloud">
                    <div class="infographic__container">
                        <img class="infographic__picture" src="../images/common/money.png" alt="">
                    </div>
                    <div class="infographic__container">
                        <span class="infographic__text">when you fulfill the condition, you win money</span>
                    </div>

                </div>
            </div>
        </div>


        <div class="how-its-work">
            <h3 class="disputes-main-page__subtitle">How it's work</h3>
            <div class="how-its-work__video-container">
                <iframe class="lazy how-its-work__video" src="https://www.youtube.com/embed/GTUruS-lnEo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>

        <div class="popular">
            <h3 class="popular__title">Most popular</h3>
            <div class="grass"></div>
            <div class="popular__container">
                <div class="popular__main-block flex-gorizontal">
                    <?= \frontend\widgets\DisputeBlock::widget([
                        //дефолтные настройки сработают толькокогда админ завтыкает
                        'defaultOrder' => [
                            //'type' => SORT_DESC,
                            //'rate' => SORT_DESC, // SORT_DESC или SORT_ASC ддя сушествующих полей базы
                            //'date_start' => SORT_DESC,
                            'id' => SORT_ASC,
                        ],
                        'query' => \common\models\Dispute::find()->where(['active'=>1]),
                        'amount' =>3
                    ]) ?>

                </div>


                 <?= Html::a('view more',Url::to(['/dispute/index']),['class'=>'popular__view-more button button_dark']) ?>
        </div>

        </div>



    <?php if (isset($text['seo_block_title']->text) && isset($text['seo_block_text']->text)) { ?>
        <section class="lazy seo-section flex-gorizontal" data-loader="customLoaderName">
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
<!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script>-->
<!--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.plugins.min.js"></script>-->
<!---->
<!--<script type="text/javascript">-->
<!---->
<!--    $(function() {-->
<!---->
<!--        $('.lazy').lazy({-->
<!--            beforeLoad: function(element) {-->
<!--                if( element.prop('tagName').toLowerCase() == "div" )-->
<!--                    console.log('element with "' +'" is about to be loaded');-->
<!--                else-->
<!--                    console.log('image "'+'" is about to be loaded');-->
<!--            },-->
<!--            asyncLoader: function(element) {-->
<!--                setTimeout(function() {-->
<!--                    element.removeClass('bg-warning  text-warning')-->
<!--                        .addClass('bg-success text-success')-->
<!--                        .load()-->
<!--                        .find('p')-->
<!--                        .html('Loaded successfully by "asyncLoader"!');-->
<!--                }, 1000);-->
<!--            }-->
<!--        });-->
<!--    });-->
<!---->
<!--</script>-->