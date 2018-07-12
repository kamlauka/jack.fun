<?php

return [
    'components' => [

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'smtp.gmail.com',
//                'username' => 'sd@terlabs.com',
//                'password' => '',
//                'port' => '465',
//                'encryption' => 'tls',
//            ],
        ],
    ],
];
