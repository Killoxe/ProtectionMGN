<?php
return [
    'components' => [
        'request' => [
            'cookieValidationKey' => '',
        ],
        'reCaptcha' => [
            'class' => 'himiklab\yii2\recaptcha\ReCaptchaConfig',
            'siteKeyV2' => '', //TODO
            'secretV2' => '', //TODO
        ],
    ],
];
