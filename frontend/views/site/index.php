<?php

use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $feedbackFormModel frontend\models\forms\FeedbackForm */
/* @var $calculateOsagoFormModel frontend\models\forms\CalculateOsagoForm */
?>

<?php Modal::begin([
    'title' => 'Форма обратной связи',
    'toggleButton' => ['label' => '1'],
    'id' => 'feedback-modal'
]); ?>
    <?= $this->render('_FeedbackForm', ['model' => $feedbackFormModel]); ?>
<?php Modal::end(); ?>



<?php Modal::begin([
    'title' => 'Предварительный расчет стоимости полиса ОСАГО',
    'toggleButton' => ['label' => '2'],
    'id' => 'calculate-osago-modal'
]); ?>
    <?= $this->render('_CalculateOsagoForm', ['model' => $calculateOsagoFormModel]); ?>
<?php Modal::end(); ?>

