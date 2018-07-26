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
>>>>>>> cf3be5fd93b9153a392bda03cb2635f263211465
            'useFileTransport' => false,
        ],
    ],
];
