<?php
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'protectionmgn-frontend',
    'language' => 'ru-RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'defaultRoute' => 'site',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-protectionmgn',
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
        ],
        'session' => [
            'name' => '_protectionmgn',
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
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => $params['url.rules']
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@frontend/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => $params['mailer.senderFrom'],
                'password' => $params['mailer.senderPassword'],
                'port' => '587', //465 - 587
                'encryption' => 'tls', //ssl - tls
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'assetManager' => [
            'appendTimestamp' => true,
            'linkAssets' => false,
            'bundles' => [
                \yii\web\JqueryAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => ['js/lib.min.js'],
                ],
                \yii\bootstrap\BootstrapAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    //'css' => ['css/lib.min.css'],
                    'css' => []
                ],
                \yii\bootstrap4\BootstrapAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/lib.min.css'],
                ],
                \yii\bootstrap\BootstrapPluginAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => ['js/lib.min.js'],
                ],
                \yii\web\YiiAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => ['js/lib.min.js'],
                ],
                yii\widgets\ActiveFormAsset::class => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => ['js/lib.min.js'],
                ],
            ],
        ],
    ],
    'params' => $params,
];
