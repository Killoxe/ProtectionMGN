<?php
Yii::setAlias('@frontend', dirname(__DIR__));

$di = \Yii::$container;

$di->set('yii\bootstrap\ActiveForm', [
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'validateOnSubmit' => true,
    'validateOnChange' => false,
    'validateOnBlur' => false,
    'options' => ['novalidate' => 'novalidate'],
    'successCssClass' => false,
    'fieldConfig' => [
        'template' => "{label}<div class='required-icon'></div>\n{input}"
    ]
]);


$di->set('yii\widgets\Pjax', [
    'timeout'=>120000
]);

$di->set('kartik\date\DatePicker', [
    'language' => 'ru',
    'pluginOptions' => [
        'placeholder' => 'Нажмите для выбора…',
        'autoclose' => true,
        'format' => 'dd.mm.yyyy',
        'allowClear' => false,
    ],
    'removeButton' => false
]);