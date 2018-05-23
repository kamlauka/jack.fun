<?php

use yii\helpers\Html;

    echo 'Username: '.$user->username.'<br>';
    echo 'Wallet: '. $user->wallet.'<br>';
    echo 'Status: : '; if($user->status === 1){echo 'Account active ';}else{echo 'Account active ';}

?>
    <br>
    <a class="btn" href="/cabinet/settings?id=<?= $user->id ?>">Settinges</a>
    <?php
        echo
          Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')')
            . Html::endForm();
        ?>
