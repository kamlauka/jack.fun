<?php if($model){?>
<h2>Jackpot № <?php echo $model->id ?></h2><br>
<h4>Sum of the jackpot: <?php echo $model->total ?> ETH</h4><br>
<h4>Date: <?php echo $model->date_start ?></h4><br>
<?php }else{echo 'Активных джекпотов не найдено';}?>