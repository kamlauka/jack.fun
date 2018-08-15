<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php'

);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
        'frontend\components\PagesLoader'
        ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [

        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'frontend\components\LangRequest',
            'web'=> '/frontend/web',
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'page/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'frontend\components\LangUrlManager',
            'rules'=>[
                '/' => 'page/index',
                '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
            ]
        ],

//        'captcha' => [
//            'class' => 'yii\captcha\CaptchaAction',
//            'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//        ],

        'language'=>'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/translations',
//                    'sourceLanguage' => 'en-EN',
//                    'fileMap' => [
//                        'app' => 'app.php',
//                    ],
                ],
            ],
        ],

    ],
    'params' => $params,
];
