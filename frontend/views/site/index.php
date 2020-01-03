<?php

/* @var $this yii\web\View */
/* @var $feedbackFormModel frontend\models\forms\FeedbackForm */
/* @var $calculateOsagoFormModel frontend\models\forms\CalculateOsagoForm */

$this->title = 'bruh';
?>

омагадбл yii2 ты что асинхронный

<?= $this->render('_FeedbackForm', ['model' => $feedbackFormModel]) ?>
<hr>
<?= $this->render('_CalculateOsagoForm', ['model' => $calculateOsagoFormModel]) ?>
