<?php
    use yii\helpers\Html;
    $this->params['breadcrumbs'][] = ['label' =>'Lottery','template' => "<li class='crumbs__link crumbs__link_active'><span class='crumb-active'>{link}</span></li>"];
?>
<section class="prize-page">
    <div class="prize-page-without-clouds container container_mob mobile-container">

        <div class="prize-page-without-clouds__small-container">
            <h2 class="prize-page-without-clouds__prize-name"><?= $lottery['name_prize']->text ?></h2>
            <?php

                if(isset($lottery['data']->img)) {
                 echo  Html::img($lottery['data']->img,['alert'=>'','class'=>'prize-page-without-clouds__image']);
                }
            ?>

            <h2 class="prize-page-without-clouds__prize-text">for only</h2>

            <h2 class="prize-page-without-clouds__prize-price">
            <?php if(isset($lottery['data']->rate)) {
                echo $lottery['data']->rate .' ETH<br>';
            } ?>
            </h2>

        </div>
        <br>
        <p class="prize-page-without-clouds__text text-wrap"><span class="gold-text"><?= $lottery['data']->total ?> ETH</span> out of <span class="gold-text"><?= $lottery['data']->currency_start ?> ETH</span> left before the draw of the prize</p>
        <p class="prize-page-without-clouds__text text-wrap"><?php if(isset($lottery['description']->text)) echo $lottery['description']->text  ?></p>
        <div class="participate prize-page-without-clouds__participate">
            <div class="participate__buttons container">
                <a class="button button_gold participate__button"
                   <?php if(Yii::$app->user->isGuest) { ?>
                       onclick="showForm('.popup__login')"
                    <?php } else { ?>
                       onclick="showForm('.popup__transaction')"
                    <?php } ?>
                   href="/lottery/participate?id=<?= $lottery['data']->id ?>">
                    Participate</a>
            </div>
            <div class="steps-container flex-gorizontal">
                <div class="steps"><span class="steps__digit">I</span>Lorem ipsum</div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">II</span>Lorem ipsum</div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">III</span>Lorem ipsum</div>
                <div class="steps-arrow"></div>
                <div class="steps"><span class="steps__digit">IV</span>Lorem ipsum</div>
            </div>
            <p class="prize-page-without-clouds__text text-wrap">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus!</p>
            <p class="prize-page-without-clouds__text"><?php if(isset($lottery['text']->text))echo $lottery['text']->text  ?></p>
        </div>
    </div>
    <div class="clouds">
        <div class="cloud-container cloud-container_center-page">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
<!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
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
    <div class="clouds clouds_bottom-default">
        <div class="cloud-container cloud-container_right-bottom">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
        <div class="cloud-container cloud-container_left-bottom">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <!--                <div class="cloud cloud__cloud3"></div>-->
            </div>
        </div>
    </div>
</section>
