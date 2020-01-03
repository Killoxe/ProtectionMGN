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

/* @var $this yii\web\View */
/* @var $model frontend\models\forms\CalculateOsagoForm */
?>

<?php Pjax::begin(['enablePushState' => false]) ?>

<?php $form = ActiveForm::begin([
    'id' => 'calculate-osago-form',
    'options' => [
        'data-pjax' => true,
    ],
]) ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= CalculateOsagoFormPeopleListEdit::widget([
        'items' => $model,
        'templateItem' => $model
    ]) ?>

    <?= $form->field($model, 'date_end_insurance_policy')->widget(DatePicker::class, []) ?>

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

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'phone',
        'mask' => '+7(999)999-99-99'
    ]) ?>

    <?= $form->field($model, 'captcha')->widget(ReCaptcha2::class)->label(false) ?>

    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?= $form->field($model, 'accept')->checkbox() ?>

<?php ActiveForm::end() ?>

<?= \frontend\widgets\Alert::widget() ?>

<?php Pjax::end(); ?>
