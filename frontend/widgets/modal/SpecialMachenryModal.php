<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class SpecialMachenryModal extends BaseModal
{
    public $title = 'Страхование имущества предприятий';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];


    public $options = [
        'id' => 'modalSpecialMachenry',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-specialMachenry-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent()
    {
        $content =
            Html::tag('p', 'Защита бизнеса от непредвиденных расходов в случае пожара или других бедствий, наносящих серьезный урон зданиям, сооружениям и другому имуществу компании.').
            Html::tag('p', 'Страхование имущества юридических лиц, позволяет защитить производственное и офисное имущество, коммуникационные и инженерные системы от ряда непредвиденных аварий.').
            Html::tag('p', 'Страхование оборудования юридических лиц компенсирует скачки напряжения, техногенные катастрофы, ошибки персонала и другие факторы, которые могут уничтожить материально-техническую базу или вывести ее из строя.').
            Html::tag('p', 'Также мы предлагаем компенсацию от воздействия ряда дополнительных рисков, которые неизбежно влечет за собой любая техногенная авария. Например, это может быть страхование от убытков вследствие перерывов в производстве и т.д.').
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