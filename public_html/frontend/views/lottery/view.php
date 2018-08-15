<?php
    use yii\helpers\Html;
    $this->params['breadcrumbs'][] = ['label' =>'Lottery','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>
<section class="prize-page">
    <div class="prize-page-without-clouds container container_mob mobile-container">

        <div class="prize-page-without-clouds__small-container">
            <?php

            if(isset($lottery['data']->img)) {
                echo  Html::img($lottery['data']->img,['alert'=>'','class'=>'prize-page-without-clouds__image']);
            }
            ?>
            <div class="prize">
                <h2 class="prize-page-without-clouds__prize-name"><?= $lottery['name_prize']->text ?></h2>


                <h2 class="prize-page-without-clouds__prize-text">
                   <?= Yii::t('lottery','for only') ?>
                    <span class="money-text">
                    <?php if(isset($lottery['data']->rate)) {
                        echo $lottery['data']->rate;
                    } ?>
                    </span>
                    <span class="money-text money-text_mini-size">ETH</span>
                </h2>

                <div class="prize-money">
                    <p class="prize-page-without-clouds__text text-wrap"><span class="gold-text"><?= $lottery['data']->total ?> </span> ETH / <span class="gold-text"><?= $lottery['data']->currency_start ?> </span> ETH</p>
                    <p class="prize-page-without-clouds__text text-wrap text-wrap_add-font"><?= Yii::t('lottery','Left before the draw of the prize') ?></p>
                    <div class="participate__buttons">

                        <?php if(!Yii::$app->user->isGuest && $lottery['user_transaction_hash'] != null ){
                            echo '<div class="participate__bet-money participate__bet-money_white"><p class="participate__bet-subtitle participate__bet-subtitle_check-mark" >'. Yii::t("index","Your bet is excepted") .'</p><p class="participate__bet-hash participate__bet-hash_dark" >hash: <br>'. $lottery['user_transaction_hash']->hash.'</p></div>';
                        }else{ ?>
                            <a class="button button_gold participate__button"
                                <?php if (Yii::$app->user->isGuest) { ?>
                                    onclick="showForm('.popup__login')"
                                <?php } else { ?>
                                    onclick="showForm('.popup__transaction')"
                                <?php } ?>>
                            <?= Yii::t('lottery','participate') ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>


        </div>


        <div class="participate prize-page-without-clouds__participate">
            <div class="steps-container flex-gorizontal">
                <div class="steps"><span class="steps__digit">I</span><?= Yii::t('lottery','Lorem ipsum') ?></div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">II</span><?= Yii::t('lottery','Lorem ipsum') ?></div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">III</span><?= Yii::t('lottery','Lorem ipsum') ?></div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">IV</span><?= Yii::t('lottery','Lorem ipsum') ?></div>
            </div>
            <h3 class="participate__title"><?= Yii::t('lottery','Lorem Ipsum is text') ?></h3>
            <p class="participate__text"><?= Yii::t('lottery','Lorem ipsum dolor sit amet,consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus!') ?> </p>
            <p class="prize-page-without-clouds__text"><?php if(isset($lottery['text']->text))echo $lottery['text']->text  ?></p>
        </div>
    </div>
    <div class="clouds clouds_all">
        <div class="cloud-container cloud-container_center-center-medium">
            <canvas class="canvas"></canvas>
        </div>
        <div class="cloud-container cloud-container_center-page">
<<<<<<< HEAD
            <canvas class="canvas"></canvas>
=======
            <canvas class="canvas canvas_large"></canvas>
>>>>>>> as
        </div>
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
    <div class="clouds clouds_bottom-default">
        <div class="cloud-container cloud-container_right-bottom">
            <div class="cloud">
<!--                <div class="cloud cloud__cloud1"></div>-->
<!--                <div class="cloud cloud__cloud2"></div>-->
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_left-bottom">
            <div class="cloud">
<!--                <div class="cloud cloud__cloud1"></div>-->
<!--                <div class="cloud cloud__cloud2"></div>-->
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
    </div>
</section>
