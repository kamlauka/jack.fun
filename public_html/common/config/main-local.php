<?php

return [
    'components' => [

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'sd@terlabs.com',
                'password' => '1234stas',
                'port' => '465',
                'encryption' => 'tls',
            ],
        ],
    ],
];
