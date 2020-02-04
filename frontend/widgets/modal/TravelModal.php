<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Accordion;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class TravelModal extends BaseModal
{
    public $title = 'Путешествия';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];

    public $options = [
        'id' => 'modalTravel',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-travel-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent ()
    {
        $content =
            Html::tag('p', 'Страховку путешественника часто называют полисом медицинского страхования туристов. Это связано с тем, что полис в первую очередь обеспечивает медицинскую помощь застрахованному при выезде с постоянного места жительства.').
            Html::tag('p', 'Полис покрывает риски, связанные с ухудшением здоровья застрахованного, это может быть обычное заболевание, экстренное (в том числе операционного) вмешательстве, получение медицинской помощи при травме или несчастном случае.').
            Accordion::widget([
                'items' => [
                    [
                        'label' => 'Страхование от не выезда',
                        'content' => Html::tag('p', 'Необходимость оформить туристическую страховку так же может возникнуть у лиц, выезжающих на территорию РФ и являющтхся нерезидентами.').
                            Html::tag('p', 'Если Вам требуеться полис для получения патента на работу можно оформитьполис добровольного страхования мигрантов.'),
                    ],
                ]
            ]).
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