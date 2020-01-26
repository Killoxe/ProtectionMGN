<?php

use yii\bootstrap4\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $feedbackFormModel frontend\models\forms\FeedbackForm */
/* @var $calculateOsagoFormModel frontend\models\forms\CalculateOsagoForm */
?>

<div class="row slider tb3in5">
    <div class="slider__wrap swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide">
                    <div class="slide__wrap">
                        <div class="swiper-pagination"></div>
                        <div>
                            <div class="h1">Расчет стоимости полиса ОСАГО</div>
                            <h4></h4>
                        </div>
                        <!-- модалка расчета ОСАГО -->
                        <a type="button" data-toggle="modal" data-target="#calculate-osago-modal">Расчет стоимости ОСАГО</a>
                    </div>
                </div>
                <div class="slide__img">
                    <img src="<?= Url::to('css/images/Картинкадлябанера.png', true) ?>" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide">
                    <div class="slide__wrap">
                        <div class="swiper-pagination"></div>
                        <div>
                            <div class="h1">Январь!</div>
                            <h4>Не бывалые скидки и подарки! При оформлении любого вида страхования!!</h4>
                        </div>
                        <a data-toggle="modal" data-target="#modalBaner1">Подробнее</a>
                    </div>
                </div>
                <div class="slide__img">
                    <img src="<?= Url::to('css/images/Картинкадлябанера.png', true) ?>" alt="">
                </div>
            </div>
            <div class="swiper-slide">
                <div class="slide">
                    <div class="slide__wrap">
                        <div class="swiper-pagination"></div>
                        <div>
                            <div class="h1">Подарки к ОСАГО</div>
                            <h4>Страховая компания на выбор<br>Все виды страхования</h4>
                        </div>
                        <a></a>
                    </div>
                </div>
                <div class="slide__img">
                    <img src="<?= Url::to('css/images/IMG_1663.jpg', true) ?>" alt="">
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<div class="row catalog tb5in5" id="catalog">
    <div class="h1">Виды страхования</div>
    <div class="h2 h2--first">Для физических лиц</div>
    <div class="catalog__cards catalog__cards--first tb5in5">
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/car.png', true) ?>" alt="">
            <div>
                <h3>Автомобили</h3>
                <span>КАСКО, ОСАГО.</span>
                <?= \frontend\widgets\modal\CarModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/home.png', true) ?>" alt="">
            <div>
                <h3>Жилье</h3>
                <span>Квартира, дом, ипотека, гражданская ответсвенность.</span>
                <?= \frontend\widgets\modal\HomeModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/treval.png', true) ?>" alt="">
            <div>
                <h3>Путешествия</h3>
                <span>ВЗР, страхование от не выезда.</span>
                <?= \frontend\widgets\modal\TravelModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle48.png', true) ?>" alt="">
            <div>
                <h3>Здоровье</h3>
                <span>Клещ, н/с, ДМС.</span>
                <?= \frontend\widgets\modal\HealthModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle47.png', true) ?>" alt="">
            <div>
                <h3>Туры</h3>
                <span>За границу и по России.</span>
                <?= \frontend\widgets\modal\ToursModal::widget() ?>
            </div>
        </div>
    </div>
    <div class="h2 h2--last">Для юридических лиц</div>
    <div class="catalog__cards catalog__cards--last tb5in5">
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle49.png', true) ?>" alt="">
            <div>
                <h3>Грузы</h3>
                <span>Авто, ЖД, судоходные.</span>
                <?= \frontend\widgets\modal\CargoModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle50.png', true) ?>" alt="">
            <div>
                <h3>Имущество юр. лиц, авто и спец техника</h3>
                <span>Здания, оборудование, офис, офисная техника, продукты, товары, сырье.</span>
                <?= \frontend\widgets\modal\SpecialMachenryModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle44.png', true) ?>" alt="">
            <div>
                <h3>ОПО</h3>
                <span>Автозаправочные станции, лифты, эскалаторы.</span>
                <?= \frontend\widgets\modal\OpoModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/handshake.png', true) ?>" alt="">
            <div>
                <h3>ГО</h3>
                <span>Гражданская ответсвенность собственников нежилых помещений, организаторов массовых мероприятий, ГО собственника автостоянки, ГО владельцев складов временного хранения.</span>
                <?= \frontend\widgets\modal\GoModal::widget() ?>
            </div>
        </div>
        <div class="catalog__card">
            <img src="<?= Url::to('css/images/Rectangle23.png', true) ?>" alt="">
            <div>
                <h3>Н/С и ДМС</h3>
                <span>Коллективное страхование сотрудников предприятия от несчастного случая и болезней, страхование руководителей предприятий от несчастного случая и болезней, добровольное мед страхование в организациях.</span>
                <?= \frontend\widgets\modal\DmsModal::widget() ?>
            </div>
        </div>
    </div>
</div>

<?= \frontend\widgets\WeAreInRegion::widget() ?>

<div class="row aboutUs tb5in5" id="aboutUs">
    <div class="aboutUs__wrap">
        <div class="h1">О нас</div>
        <div class="h2">Страховое агенство “Защита - MGN”</div>
        <span>Это профессиональная команда, предоставляющая качественные услуги в сфере страхования.</span>
        <div class="h2">Наши приемущества:</div>
        <ul>
            <li>
                <h4>Надежность и постоянство</h4>
                <span>5 лет мы помогаем нашим клиентам сохранять свое имущество и здоровье.</span>
            </li>
            <li>
                <h4>Нам доверяют</h4>
                <span>Мы помогаем не только выгодно оформить договор страхования, но и, в случае необходимости, получить возмещение при наступлении страхового случая.</span>
            </li>
            <li>
                <h4>Ваша выгода</h4>
                <span>Экономия Ваших сил и денежных средств при условии высокого уровня страхового возмещения.</span>
            </li>
            <li>
                <h4>Ваша защита</h4>
                <span>Для наших клиентов мы создаем надежную защиту жизни и здоровья, а так же защиту их имущества.</span>
            </li>
        </ul>
        <div class="h2">Почему мы:</div>
    </div>

    <div class="swiper-container aboutUs__slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide">Мы делаем расчеты Вы выбераете страховую компанию</div>
            <div class="swiper-slide">Предлагаем только надежные страховые компании</div>
            <div class="swiper-slide">Круглосуточная служба наших аварийных комиссаров</div>
            <div class="swiper-slide">Бесплатное юридическое сопровождение</div>
            <div class="swiper-slide">Собственная станция технического обслуживания</div>
            <div class="swiper-slide">Постоянные акции, скидки и подарки</div>
            <div class="swiper-slide">У нас нет утомительных очередей! Расчет удаленно! Доставка полиса на дом или работу</div>
        </div>
    </div>
</div>

<?php Modal::begin([
    'title' => 'Форма обратной связи',
    'toggleButton' => false,
    'id' => 'feedback-modal'
]); ?>
    <?= $this->render('_FeedbackForm', ['model' => $feedbackFormModel]); ?>
<?php Modal::end(); ?>

<?php Modal::begin([
    'title' => 'Предварительный расчет стоимости полиса ОСАГО',
    'toggleButton' => false,
    'id' => 'calculate-osago-modal'
]); ?>
    <?= $this->render('_CalculateOsagoForm', ['model' => $calculateOsagoFormModel]); ?>
<?php Modal::end(); ?>

