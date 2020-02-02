<?php
use yii\helpers\Url;
use frontend\components\helpers\Html;
?>

<header class="header container-fluid">
    <div class="container">
        <div class="row header__wrap">
            <div class="header__burger">
                <div class="header__btn">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/logo.svg', true)
                    ],
                ]) ?>
                <div class="navbar">
                    <a href="#slider">Главная</a>
                    <a href="#catalog">Виды страхования</a>
                    <a href="#map">Мы в регионе</a>
                    <a href="#aboutUs">О нас</a>
                </div>
            </div>
            <div class="header__contacts">
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/phone-call.svg', true)
                    ],
                ]) ?>
                <a href="tel:89090950666">8 (909) 095-06-66</a>
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/envelope.svg', true)
                    ],
                ]) ?>
                <a href="mailto:89090950666@bk.ru">89090950666@bk.ru</a>
            </div>
        </div>
        <div class="menu">
            <div><a href="#slider">Главная</a></div>
            <div><a href="#catalog">Виды страхования</a></div>
            <div><a href="#map">Мы в регионе</a></div>
            <div><a href="#aboutUs">О нас</a></div>
        </div>
    </div>
</header>
