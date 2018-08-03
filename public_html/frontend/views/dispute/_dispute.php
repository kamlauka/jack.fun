<div class="">
    <div class="product-item">
        <div>
            <?php //if($model->date_start <= time() && time() <= $model->date_end)  ?>
            <a href="/dispute/view?id=<?=$model->id ?>"><?='id= '. $model->id ?></a>
        <?= ' ' .$model->name.' '.$model->rate.' '.$model->type.'   '.$model->date_start.' '.$model->description?>
    </div>
    </div>
</div>