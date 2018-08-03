<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property int $id
 * @property string $alias
 * @property string $name
 * @property string $local
 * @property string $activ
 */
class Language extends \yii\db\ActiveRecord
{

    //Переменная, для хранения текущего объекта языка
    static $current = null;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'name', 'active', 'local'], 'required'],
            [['alias', 'name'], 'string', 'max' => 32],
            [['active','alias','local'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'name' => 'Name',
            'local' => 'Local',
            'active' => 'Active',
        ];
    }

    static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

//Установка текущего объекта языка и локаль пользователя
    static function setCurrent($alias = null)
    {
        $language = self::getLangByUrl($alias);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;

        Yii::$app->language = self::$current->local;
    }

//Получения объекта языка по умолчанию
    static function getDefaultLang()
    {
        return Language::find()->where(['alias'=>'en'])->one();
    }

//Получения объекта языка по буквенному идентификатору
    static function getLangByUrl($alias = null)
    {
        if ($alias === null) {
            return null;
        } else {
            $language = Language::find()->where(['alias'=>$alias])->one();
            if ( $language === null ) {
                return null;
            }else{
                return $language;
            }
        }
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getActiveLanguageObjects(){
        return Language::find()->where(['active'=>'active'])->all();
    }





}


