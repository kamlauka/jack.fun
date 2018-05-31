<?php
use yii\helpers\Html;
?>


<?php
    if($user->avatar){
        echo  '<img src="'.$user->avatar.'" >';
    }
    echo '<br>';
    echo  $user->username.'<br>';
    if($user->phone){
        echo 'my phone number: '.$user->phone.'<br>';
    }
    if($user->wallet){
        echo 'my wallet: '. $user->wallet.'<br>';
    }
    if($user->email){
        echo 'my email: '. $user->email;
    }
?>
    <br>
    <a class="btn btn-success" href="/cabinet/eiting?id=<?= $user->id ?>">Editing</a>

