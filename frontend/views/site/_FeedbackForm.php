<?php

use yii\widgets\Pjax;
use himiklab\yii2\recaptcha\ReCaptcha2;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;
use frontend\models\staticLists\InsuranceType;

/* @var $this yii\web\View */
/* @var $model frontend\models\forms\FeedbackForm */
?>

<?php Pjax::begin(['enablePushState' => false, 'id' => 'feedback-pjax']) ?>

<?php $form = ActiveForm::begin([
    'id' => 'feedback-form',
    'options' => [
        'data-pjax' => true,
    ],
    'action' => ['site/feedback-form'],
    'validationUrl' => ['site/feedback-form-validation']
]) ?>

    <?= Html::beginTag('div', ['style' => ['margin-bottom' => '15px']]); ?>
        Обязательное для заполнение поле
        <?= Html::tag('div', '', ['class' => 'required-icon']); ?>
    <?= Html::endTag('div'); ?>

    <?= $form
        ->field($model, 'surname', ['errorOptions' => ['tag' => false]])
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form
        ->field($model, 'name', ['errorOptions' => ['tag' => false]])
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form
        ->field($model, 'patronymic')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form
        ->field($model, 'email')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'phone',
        'mask' => '+7(999)999-99-99',
        'options' => ['placeholder' => 'Введите телефон']
    ]) ?>

    <?= $form->field($model, 'insurance')->widget(Select2::class, [
        'data' => InsuranceType::getList(),
        'options' => [
            'placeholder' => 'Выберите вид страхования',
        ],
    ]) ?>

    <?= $form
        ->field($model, 'message')
        ->textarea(['rows' => 6, 'placeholder' => 'Ваш ответ']) ?>

    <?= $form->field($model, 'captcha', ['template' => "{input}"])->widget(ReCaptcha2::class)->label(false) ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn']) ?>

    <?= $form
        ->field($model, 'accept')
        ->checkbox(['template' => "{input}\n{hint}\n{beginLabel}{labelTitle}{endLabel}"]); ?>

<?php ActiveForm::end() ?>

<?= \frontend\widgets\Alert::widget() ?>

<?php Pjax::end(); ?>