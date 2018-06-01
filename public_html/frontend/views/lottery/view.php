<?php



echo 'Lottery №'. $lottery->id .'<br>';



if($lottery->rate ) {
    echo ' for only'. $lottery->rate .' ETH<br>';
}

if($lottery->img) {
    echo '<img src=' . $lottery->img . ' alt=""><br>';
}

?>