<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Accordion;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class ToursModal extends BaseModal
{
    public $title = 'Туры';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];

    public $options = [
        'id' => 'modalTours',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-tours-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent ()
    {
        $content =
            Html::tag('p', 'Уважаемые страхователи!').
            Html::tag('p', 'Предлагаем Вашему вниманию туристические путевки в пансионаты и дома отдыха России и нашей области, а так же специальные предложения по Крыму ("Крым круглый год") и Краснодарскому краю на лето 2020 года и туры по заграничным направлениям (отели Турции, Тайланда и др.)!!!').
            Html::tag('p', 'Благодаря хорошим объемам продаж и надежной репутации у нас есть возможность предложить для Вас выгодные цены с хорошими скидками.').
            Html::tag('p', 'Оформляя тур через наше агентство, Вы можете вернуть 13%.').
            Button::widget([
                'text' => 'ОФОРМИТЬ',
                'options' => [
                    'class' => 'btn-in-modal',
                    'data' => [
                        'toggle' => 'modal',
                        'target' => '#feedback-modal'
                    ]
                ]
            ]);

        return $content;
    }
}