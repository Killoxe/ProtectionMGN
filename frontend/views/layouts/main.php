<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to('css/images/favicon/apple-touch-icon.png', true) ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Url::to('css/images/favicon/favicon-32x32.png', true) ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= Url::to('css/images/favicon/favicon-16x16.png', true) ?>">
    <link rel="manifest" href="<?= Url::to('css/images/favicon/site.webmanifest', true) ?>">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://unpkg.com/swiper/css/swiper.min.css">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="slider">
<?php $this->beginBody() ?>

    <?= $this->render('_header') ?>
    <div class="container">
        <?= $content ?>
    </div>
    <?= $this->render('_footer') ?>
    <a href="#slider" class="butUp hidden"></a>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/js/swiper.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
