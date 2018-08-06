<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 05.06.2018
 * Time: 9:59
 */

namespace common\widgets;

use yii\base\Widget;
use common\models\Language;

class TranslationForm extends Widget
{
    public $attributes;
    public $form;
    public $model;


    public function Run()
    {
        $languages = Language::getActiveLanguageObjects();

        foreach ($languages as $lang) {

            foreach ($this->attributes as $attribut)
            {
                echo $this->form->field($this->model, $lang->alias.'_'.$attribut)->textInput(['maxlength' => true]);
            }
        }

    }

    public function init()
    {
        parent::init();
    }


}