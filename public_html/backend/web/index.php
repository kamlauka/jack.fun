<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
<<<<<<< HEAD
defined('YII_ENV') or define('YII_ENV', 'dev');//dev test
=======
defined('YII_ENV') or define('YII_ENV', 'dev');
>>>>>>> 84375f11d567efa0d9b4e66170e05c474cfa472f

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../config/main.php',
    require __DIR__ . '/../config/main-local.php'
);

(new yii\web\Application($config))->run();
