<section class="prize-page page-container">

    <div class="prize-page-without-clouds container">
        <div class="crumbs">
            <a class="crumbs__link" href="#">Home</a>
            <a class="crumbs__link crumbs__link_active" href="#">Terms of Agreement</a>
        </div>
        <div class="prize-page-without-clouds__small-container">
            <h2 class="prize-page-without-clouds__prize-name">iphone X</h2>
            <?php
                if($lottery->img) {
                    \yii\helpers\Html::img($lottery->img,['alert'=>'','class'=>'prize-page-without-clouds__image']);
                }
            ?>

            <h2 class="prize-page-without-clouds__prize-text">for only</h2>
            <h2 class="prize-page-without-clouds__prize-price">
            <?php if($lottery->rate ) {
                echo ' for only'. $lottery->rate .' ETH<br>';
            } ?>
            </h2>

        </div>
        <div class="timer prize-page-without-clouds__timer">
            <h3 class="timer__days"><span class="days prize-page-without-clouds__big-font"></span> DAY <span class="hours"></span> : <span class="minutes"></span> : <span class="seconds"></span></h3>
        </div>
        <p class="prize-page-without-clouds__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus!</p>
        <div class="participate prize-page-without-clouds__participate">
            <div class="participate__buttons container">
                <a class="button button_gold participate__button" href="/lottery/participate?id=<?= $lottery->id ?>">Participate</a>
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
            <p class="prize-page-without-clouds__text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus! Praesentium, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eum necessitatibus nulla quisquam ratione reprehenderit rerum voluptate? Ab doloremque, magnam minus nemo pariatur quia saepe vel vero! Distinctio dolores, earum magnam magni quod quos recusandae repudiandae sed! Amet animi eum ex facilis nam obcaecati officiis, omnis quis reprehenderit rerum ullam.</p>
        </div>
    </div>
    <div class="clouds">
        <div class="cloud-container cloud-container_center-page">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_center-center-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_center-left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_center-right-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_border-left-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_border-right-medium">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>

        <div class="cloud-container cloud-container_right-bottom">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
        <div class="cloud-container cloud-container_left-bottom">
            <div class="cloud">
                <div class="cloud cloud__cloud1"></div>
                <div class="cloud cloud__cloud2"></div>
                <div class="cloud cloud__cloud3"></div>
            </div>
        </div>
    </div>
</section>
