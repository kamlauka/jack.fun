<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=admin_jackpot',
<<<<<<< HEAD
            'username' => 'admin_jackpot',
            'password' => 'BUdJgqRh3s',
=======
            'username' => 'root',
            'password' => '',
>>>>>>> 174129d97f814523eac2b0eb3d4ddbdc5fe1dade
            'charset' => 'utf8',
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
        ],





    ],
];
