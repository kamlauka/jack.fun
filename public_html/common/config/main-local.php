<?php

return [
    'components' => [

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
<<<<<<< HEAD
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
=======
>>>>>>> cc03a62d66436ca5fcc24a44b214fdbcf2fe9d95
            'useFileTransport' => false,
        ],
    ],
];
