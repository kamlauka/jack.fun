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
        $langs = Language::find()->where(['activ'=>'activ'])->all();

        foreach ($langs as $lang) {

            foreach ($this->attributes as $attribut)
            {
//                return $this->render('TranslationForm',[
//                    'attribut'=>$lang->alias.'_'.$attribut,
//                    'form'=>$this->form,
//                    'model'=>$this->model,
//                ]);
                echo $this->form->field($this->model, $lang->alias.'_'.$attribut)->textInput(['maxlength' => true]);
            }

        }

        //return $this->render('TranslationForm');
    }

    public function init()
    {

        parent::init();
    }


}