<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Lottery;
use common\models\Modification;

class Infographics extends Widget {


    public function init()
    {
       parent::init();

             echo $this->render('infographic/view.php', [
             ]);
    }

}