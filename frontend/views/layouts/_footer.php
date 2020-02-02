<?php
use yii\helpers\Url;
use frontend\components\helpers\Html;
?>

<footer class="container-fluid">
    <div class="container">
        <h3>Свяжитесь с нами</h3>
        <a href="tel:89090950666">8 (909) 095-06-66</a><br>
        <a href="mailto:89090950666@bk.ru">89090950666@bk.ru</a>
        <div>
            <a class="null" target="_blank" href="https://www.instagram.com/zashchita_mgn/">
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/instagram.svg', true)
                    ],
                ]) ?>
            </a>
            <a class="null" target="_blank" href="viber://add?number=89068546008">
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/viber.svg', true)
                    ],
                ]) ?>
            </a>
            <a class="null" target="_blank" href="https://vk.com/club187754082">
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/vk.svg', true)
                    ],
                ]) ?>
            </a>
            <a class="null" target="_blank" href="whatsapp://send?phone=89068546008">
                <?= Html::tag('img', null, [
                    'class' => 'lazyload',
                    'data' => [
                        'src' => Url::to('css/images/whatsapp.svg', true)
                    ],
                ]) ?>
            </a>
        </div>
    </div>
</footer>
