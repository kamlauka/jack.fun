<?php
    use common\models\Language;
    use common\models\Translation;
?>
<h2>Raffle of goods</h2>
<?php
if($lotteries){
foreach ($lotteries as $lottery){
    $name = Translation::find()->where(['target_id' => $lottery->id, 'alias' => 'name' ,'language_id' => 2])->one();
    $description = Translation::find()->where(['target_id' => $lottery->id, 'alias' => 'description' ,'language_id' => 2])->one();
    $prize = Translation::find()->where(['target_id' => $lottery->id, 'alias' => 'prize','language_id' => 2])->one();

   echo 'Lottery №'. $lottery->id .'<br>';
    if(isset($name->text)) {
        echo  $name->text . '<br>';
    }
    if(isset($prize->text) && isset($lottery->rate)) {
        echo  $prize->text . ' for only'. $lottery->rate .' ETH<br>';
    }

    if(isset($lottery->img)) {
        echo '<img src=' . $lottery->img . ' alt=""><br>';
    }

    if(isset($description->text)) {
        echo 'Description: ' . $description->text . '<br>';
    }


   echo '<hr>';

    }
}else{
    echo '';
}
?>

