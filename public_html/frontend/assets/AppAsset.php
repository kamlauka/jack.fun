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
        'css/jquery.scrollbar.css',
        'css/main.css',
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
        'js/preloader.js',
        'js/app.js',
        'js/gsap/src/minified/TweenMax.min.js',
        'js/gsap/src/minified/TimelineMax.min.js',
        'js/jquery.scrollbar-gh-pages/jquery.scrollbar.min.js',
        'js/scrollbar.js',
        'js/currency.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
