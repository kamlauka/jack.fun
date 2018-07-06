<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */

//$this->title = 'Editing';
?>

<div class="user-info about-user-info__paragraph">

    <div class="user-logo-container">
        <?php
        if(isset($model->avatar)){
            echo Html::img($model->avatar,['alt'=>"your logo", 'class'=>"user-logo about-user-info__user-logo"]);
        }else{
            echo '<img class="user-logo about-user-info__user-logo" src="../../images/cabinet/default-logo.png" alt="">';
        }
        ?>
    </div>


    <?php
    if(isset($model->username)){
        echo Html::tag('p',$model->username,['class'=>'user-name about-user-info__user-name']);
    } ?>

</div>
<?php if(isset($model->phone)){ ?>
    <div class="about-user-info__paragraph">
        <p class="about-user-info__title">my phone-number:</p>
        <p class="about-user-info__info"><?= $model->phone ?> </p>
    </div>
<?php } ?>

<?php  if(isset($model->wallet)){ ?>
    <div class="about-user-info__paragraph">
        <p class="about-user-info__title">my wallet:</p>
        <p class="about-user-info__info"><?= $model->wallet ?> </p>
    </div>
<?php } ?>

<?php  if(isset($model->email)){ ?>
    <div class="about-user-info__paragraph">
        <p class="about-user-info__title">my email:</p>
        <p class="about-user-info__info"><?= $model->email ?> </p>
    </div>
<?php } ?>

<a class="button button_gold" href="/cabinet/editing" >Edit info</a>
