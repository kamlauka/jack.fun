<?php
use common\models\Language;
?>
<h2>Raffle of goods</h2>
<?php
if($lotteries){
foreach ($lotteries as $lottery){
    $name = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'name' ,'language_id' => 'en'])->one();
    $description = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'description' ,'language_id' => 'en'])->one();
    $prize = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'prize','language_id' => 'en'])->one();

   echo 'Lottery №'. $lottery->id .'<br>';
    if($name->text) {
        echo  $name->text . '<br>';
    }
    if($prize->text && $lottery->rate) {
        echo  $prize->text . ' for only'. $lottery->rate .' ETH<br>';
    }

    if($lottery->img) {
        echo '<img src=' . $lottery->img . ' alt=""><br>';
    }

    if($description->text) {
        echo 'Description: ' . $description->text . '<br>';
    }


   echo '<hr>';

    }
}else{
    echo '';
}
?>

