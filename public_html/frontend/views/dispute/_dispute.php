<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="lazy popular__block disputes-block">
    <div class="disputes-block__players-container players-container">
        <div class="players-container__players">
            <div class="players-container__first-player player">
                <?php if(isset($initiatorObject->avatar)){?>
                    <img class="lazy player__image" data-src="<?= $initiatorObject->avatar ?>" alt="">
                <?php }else{ ?>
                    <img class="lazy player__image" data-src="../../images/common/ava2.png" alt="">
                <?php } ?>

                <span class="player__name"><?= isset($initiatorObject->username)?$initiatorObject->username:'' ?></span>
            </div>

            <div class="players-container__vs">
                <span class="players-container__begin"><?= $model->date_start ?></span>
            </div>
            <div class="players-container__second-player player">
                <?php if(isset($executorObject->avatar)){?>
                    <img class="lazy player__image" data-src="<?= $model->avatar ?>" alt="">
                <?php }else{ ?>
                    <img class="lazy player__image" data-src="../../images/common/ava1.png" alt="">
                <?php } ?>

                <span class="player__name"><?= isset($executorObject->username)?$executorObject->username:'' ?></span>
            </div>
        </div>
    </div>


    <div class="disputes-block__video-container">
        <img class="lazy disputes-block__video" data-src="../../images/common/video-dispute.png" alt="">
    </div>
    <div class="disputes-block__description dispute-description">
        <h4 class="dispute-description__title"><?= $model->name?></h4><!--           заголовок-->

        <p class="dispute-description__description"><?= $model->description?></p><!--           описание-->

        <?= Html::a('watch',Url::to(['/dispute/view','id'=>$model->id]),['class'=>'dispute-description__watch  button button_gold']) ?>

    </div>
</div>