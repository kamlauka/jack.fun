<?php
    $this->params['breadcrumbs'][] = ['label' =>'Disputes','link'=>'dispute/index','template' => "<li class='crumbs__link crumbs__link_active'><a href='dispute/index' class='crumb-active'></a></li>"];
    $this->params['breadcrumbs'][] = ['label' =>'Dispute','template' => "<li class='crumbs__link crumbs__link_active'><a class='crumb-active'>{link}</a></li>"];
?>

    <?php if($model){?>


<section class="prize-page">
    <div class="prize-page-without-clouds prize-container container_mob mobile-container">
        <div class="dispute-flex-gorizontal">









        </div>
        <div class="clouds clouds_bottom clouds_over-all">

            <div class="cloud-container cloud-container_left-middle-jackpot">
                <div class="cloud">

                </div>
            </div>
            <div class="cloud-container cloud-container_center-middle-jackpot">
                <div class="cloud">

                </div>
            </div>
            <div class="cloud-container cloud-container_right-bottom-middle-jackpot">
                <div class="cloud">

                </div>
            </div>

        </div>

        <div class="participate over-all  mobile-border container ">

            <h3 class="participate__title">Lorem Ipsum is text</h3>
            <p class="participate__text participate__text_nomargin"><?= $model['description']->text ?></p>
<br>
        </div>


     <?php }else{echo 'Активных джекпотов не найдено';}?>
    </div>
    <div class="clouds">
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
</section>