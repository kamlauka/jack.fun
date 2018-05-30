<?php
use common\models\Language;
?>
<h2>Raffle of goods</h2>
<?php

foreach ($lotteries as $lottery){
    $name = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'name' ,'language_id' => 'en'])->one();
    $description = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'description' ,'language_id' => 'en'])->one();
    $prize = Language::find()->where(['target_id' => $lottery->id, 'alias' => 'prize','language_id' => 'en'])->one();

   echo 'Lottery №'. $lottery->id .'<br>';
    if($name->text) {
        echo 'Lottery name: ' . $name->text . '<br>';
    }
    if($description->text) {
        echo 'Description: ' . $description->text . '<br>';
    }
   echo 'Rate:'. $lottery->rate .' ETH<br>';
    if($prize->text) {
        echo 'Name_prize: '. $prize->text .'<br>';
        }
    if($lottery->img) {
        echo '<img src=' . $lottery->img . ' alt=""><br>';
    }
   echo '<hr>';


}

?>

