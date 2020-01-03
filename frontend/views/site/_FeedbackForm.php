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

<?php Pjax::begin(['enablePushState' => false]) ?>

<?php $form = ActiveForm::begin([
    'id' => 'feedback-form',
    'options' => [
        'data-pjax' => true,
    ],
]) ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'patronymic') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'phone',
        'mask' => '+7(999)999-99-99'
    ]) ?>

    <?= $form->field($model, 'insurance')->widget(Select2::class, [
        'data' => InsuranceType::getList(),
        'options' => [
            'placeholder' => 'Выберите вид страхования',
        ],
    ]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>



    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>

    <?= $form->field($model, 'accept')->checkbox() ?>

<?php ActiveForm::end() ?>

<?= \frontend\widgets\Alert::widget() ?>

<?php Pjax::end(); ?>