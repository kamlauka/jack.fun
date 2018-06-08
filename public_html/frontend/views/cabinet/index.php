<?php
    use yii\helpers\Html;
?>

<section class="cabinet flex-gorizontal page-container">
    <div class="clouds cabinet__clouds ">
        <div class="cloud-container cloud-container_left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_around-left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
    </div>
    <div class="empty-block empty-block_left"></div>
    <div class="cabinet__about-user about-user-info">
        <div class="about-user-info__wrapper">
            <div class="user-info about-user-info__container">
               <?php
                    if(isset($user->avatar)){
                        echo Html::img($user->avatar,['alt'=>"your logo", 'class'=>"user-logo user-info__user-logo"]);
                    }
               ?>
                <?php
                    if(isset($user->username)){
                       echo Html::tag('p',$user->username,['calss'=>'user-info__user-logo']);
                } ?>

            </div>
            <?php if(isset($user->phone)){ ?>
                <div class="number user-info__paragraph">
                    <p class="user-info__title">my phone-numbers:</p>
                    <p class="user-info__info"><?= $user->phone ?></p>
                </div>
            <?php } ?>

            <?php  if(isset($user->wallet)){ ?>
                <div class="wallet user-info__paragraph">
                    <p class="user-info__title">my wallets:</p>
                    <p class="user-info__info"><?= $user->wallet ?></p>
                </div>
            <?php } ?>

            <?php  if(isset($user->email)){ ?>
                <div class="mail user-info__paragraph">
                    <p class="user-info__title">my email:</p>
                    <p class="user-info__info"><?= $user->email ?></p>
                </div>
            <?php } ?>

            <a href="/cabinet/eiting?id=<?= $user->id ?>" class="button button_gold">Editing</a>
        </div>

    </div>
    <div class="cabinet__disputes disputes">
        <h1>Coming soon</h1>
    </div>
    <div class="empty-block empty-block_right"></div>
</section>


<!--<section class="cabinet flex-gorizontal page-container">-->
<!--    <div class="grass"></div>-->
<!--    <div class="cabinet__about-user about-user-info">-->
<!--        <div class="about-user-info__wrapper">-->
<!--            <div class="user-info about-user-info__paragraph">-->
<!--                --><?php
//                if(isset($user->avatar)){
//                    echo Html::img($user->avatar,['alt'=>"your logo", 'class'=>"user-logo about-user-info__user-logo"]);
//                }
//                ?>
<!--                --><?php
//                if(isset($user->username)){
//                    echo Html::tag('p',$user->username,['class'=>'user-name about-user-info__user-name']);
//                } ?>
<!---->
<!--            </div>-->
<!--            --><?php //if(isset($user->phone)){ ?>
<!--                <div class="number about-user-info__paragraph">-->
<!--                    <p class="about-user-info__title">my phone-numbers:</p>-->
<!--                    <p class="about-user-info__info">--><?//= $user->phone ?><!--</p>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!---->
<!--            --><?php // if(isset($user->wallet)){ ?>
<!--                <div class="wallet about-user-info__paragraph">-->
<!--                    <p class="about-user-info__title">my wallets:</p>-->
<!--                    <p class="about-user-info__info">--><?//= $user->wallet ?><!--</p>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!---->
<!--            --><?php // if(isset($user->email)){ ?>
<!--                <div class="mail about-user-info__paragraph">-->
<!--                    <p class="about-user-info__title">my email:</p>-->
<!--                    <p class="about-user-info__info">--><?//= $user->email ?><!--</p>-->
<!--                </div>-->
<!--            --><?php //} ?>
<!---->
<!--            <a href="/cabinet/eiting?id=--><?//= $user->id ?><!--" class="button button_gold">Editing</a>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="cabinet__disputes disputes mobile-border-gray">-->
<!--        <h1 class="disputes__title">Coming soon</h1>-->
<!--        <div class="disputes__image" ><img src="images/cabinet/favn2.png" alt="favn"></div>-->
<!---->
<!--    </div>-->
<!--    <div class="empty-block empty-block_right"></div>-->
<!---->
<!--    <div class="clouds cabinet__clouds ">-->
<!--        <div class="cloud-container cloud-container_left-medium">-->
<!--            <div class="cloud">-->
<!--                <div class="cloud cloud__cloud1"></div>-->
<!--                <div class="cloud cloud__cloud2"></div>-->
<!--                <!--                <div class="cloud cloud__cloud3"></div>-->-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="cloud-container cloud-container_around-left-medium">-->
<!--            <div class="cloud">-->
<!--                <div class="cloud cloud__cloud1"></div>-->
<!--                <div class="cloud cloud__cloud2"></div>-->
<!--                <!--                <div class="cloud cloud__cloud3"></div>-->-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->



