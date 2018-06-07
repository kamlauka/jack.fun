<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/normalize.css',
        'css/main.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
        'js/app.js',
        'js/jquery.paroller.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
