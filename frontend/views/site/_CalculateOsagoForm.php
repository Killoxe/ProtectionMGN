<?php

use yii\widgets\Pjax;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\date\DatePicker;
use himiklab\yii2\recaptcha\ReCaptcha2;
use yii\widgets\MaskedInput;
use frontend\models\staticLists\HorsePower;
use frontend\models\staticLists\Registration;
use frontend\widgets\CalculateOsagoFormPeopleListEdit\CalculateOsagoFormPeopleListEdit;
use frontend\widgets\Button;

/* @var $this yii\web\View */
/* @var $model frontend\models\forms\CalculateOsagoForm */
?>

<?php Pjax::begin(['enablePushState' => false, 'id' => 'calculate-osago-pjax']) ?>

<?php $form = ActiveForm::begin([
    'id' => 'calculate-osago-form',
    'options' => [
        'data-pjax' => true,
    ],
    'action' => ['site/calculate-osago-form'],
    'validationUrl' => ['site/calculate-osago-form-validation']
]) ?>

    <?= Html::beginTag('div', ['class' => 'label-need-to-fill']); ?>
        Обязательное для заполнение поле
        <?= Html::tag('div', '', ['class' => 'required-icon']); ?>
    <?= Html::endTag('div'); ?>

    <?= $form
        ->field($model, 'surname')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form
        ->field($model, 'name')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form
        ->field($model, 'patronymic')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form->field($model, 'peopleValid')
        ->hiddenInput() ?>

    <?= CalculateOsagoFormPeopleListEdit::widget([
        'items' => $model,
        'templateItem' => $model
    ]) ?>

    <?= $form
        ->field($model, 'date_end_insurance_policy', ['template' => "{label}\n{input}"])
        ->widget(DatePicker::class, [
            'options' => [
                'placeholder' => 'Выберите дату',
                'autocomplete' => 'off'
            ]
        ]) ?>

    <?= $form->field($model, 'horse_power')->radioList(
        HorsePower::getList(),
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                $id = "calculateosagoform-horse_power-$index";
                $content =
                    Html::radio($name, $checked, ['value' => $value, 'id' => $id]).
                    Html::label($label, $id, ['class' => 'control-label']);

                return Html::tag('div', $content, ['class' => '']);
            }
        ]) ?>

    <?= $form->field($model, 'registration')->radioList(
        Registration::getList(),
        [
            'item' => function ($index, $label, $name, $checked, $value) {
                $id = "calculateosagoform-registration-$index";
                $content =
                    Html::radio($name, $checked, ['value' => $value, 'id' => $id]).
                    Html::label($label, $id, ['class' => 'control-label']);

                return Html::tag('div', $content, ['class' => '']);
            }
        ]) ?>

    <?= $form
        ->field($model, 'email')
        ->textInput(['placeholder' => 'Ваш ответ']); ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'phone',
        'mask' => '+7(999)999-99-99',
        'options' => [
            'placeholder' => 'Введите телефон'
        ]
    ]) ?>

    <?= $form->field($model, 'captcha', ['template' => "{input}"])->widget(ReCaptcha2::class)->label(false) ?>

    <?= Html::submitButton(Html::tag('span', 'Отправить'), ['class' => 'btnn']) ?>

    <?= $form
        ->field($model, 'accept')
        ->checkbox(['template' => "{input}\n{hint}\n{beginLabel}{labelTitle}{endLabel}"]); ?>

<?php ActiveForm::end() ?>

<?= \frontend\widgets\Alert::widget() ?>

<?php Pjax::end(); ?>
