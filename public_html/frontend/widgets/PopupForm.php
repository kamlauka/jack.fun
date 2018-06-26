<?php
namespace frontend\widgets;

use yii\base\Widget;

class PopupForm extends Widget {

    public $model;
    public $view;

    public function init()
    {

        parent::init();
        echo $this->render('popup-form/'.$this->view, ['model' => new $this->model]);

    }

}