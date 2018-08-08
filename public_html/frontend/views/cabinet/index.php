<?php

    use yii\widgets\Pjax;
    $this->params['breadcrumbs'][] = ['label' =>'Cabinet','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>

<section class="cabinet flex-gorizontal">
    <div class="grass grass__bush" ></div>
    <div class="empty-block empty-block_left"></div>
<!--    <div class="container wrap_cabinet">-->

    <div class="cabinet__about-user about-user-info">
<!--        onclick="event.stopPropagation()"-->
        <div class="about-user-info__wrapper" id="user-info" >
            <?php Pjax::begin(['id'=>Yii::$app->controller->action->id]); ?>

            <?php include 'content/'.Yii::$app->controller->action->id.'.php' ?>

            <?php Pjax::end(); ?>

        </div>
    </div>
    <div class="cabinet__disputes disputes mobile-border-gray">
        <h1 class="disputes__title">Coming soon</h1>
        <div class="disputes__image-container">
            <img class="disputes__notes note1" src="../../../images/cabinet/note-1.png" alt="">
            <img class="disputes__notes note2" src="../../../images/cabinet/note-1.png" alt="">
            <img class="disputes__notes note3" src="../../../images/cabinet/note2.png" alt="">
            <img class="disputes__notes note4" src="../../../images/cabinet/note3.png" alt="">
        </div>
        <div class="disputes__image" ><img src="../../../images/cabinet/favn2.png" alt="favn"></div>

    </div>

<!--    </div>-->
    <div class="empty-block empty-block_right"></div>

</section>
<div class="clouds clouds__cabinet ">
    <div class="cloud-container cloud-container_left-medium">
        <div class="cloud">
            <div class="cloud cloud__cloud1"></div>
            <div class="cloud cloud__cloud2"></div>
            <!--                <div class="cloud cloud__cloud3"></div>-->
        </div>
    </div>
    <div class="cloud-container cloud-container_around-left-medium">
        <div class="cloud">
            <div class="cloud cloud__cloud1"></div>
            <div class="cloud cloud__cloud2"></div>
            <!--                <div class="cloud cloud__cloud3"></div>-->
        </div>
    </div>
</div>



