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
                'username' => 'username@gmail.com',
                'password' => 'password',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];
