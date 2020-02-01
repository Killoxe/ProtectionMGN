<?php
use yii\helpers\Url;
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
                <img src="<?= Url::to('css/images/logo.svg', true) ?>" alt="">
                <div class="navbar">
                    <a href="#slider">Главная</a>
                    <a href="#catalog">Виды страхования</a>
                    <a href="#map">Мы в регионе</a>
                    <a href="#aboutUs">О нас</a>
                </div>
            </div>
            <div class="header__contacts">
                <img src="<?= Url::to('css/images/phone-call.svg', true) ?>" alt=""><a href="tel:89090950666">8 (909) 095-06-66</a>
                <img src="<?= Url::to('css/images/envelope.svg', true) ?>" alt=""><a href="mailto:89090950666@bk.ru">89090950666@bk.ru</a>
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