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
//        'css/jquery.scrollbar.css',
        'css/main.css',
    ];
    public $js = [
        'js/jquery-lazy/jquery.lazy.min.js',
        'js/jquery-lazy/jquery.lazy.plugins.min.js',
        'js/lazy.js',
        'js/preloader.js',
        'js/app.js',
        'js/gsap/src/minified/TweenMax.min.js',
//        'js/gsap/src/minified/TimelineMax.min.js',
//        'js/jquery.scrollbar-gh-pages/jquery.scrollbar.min.js',
        'js/timer.js',
//        'js/scrollbar.js',
        'js/currency.js',
        'js/animateClouds.js',
        'js/animateNotes.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
