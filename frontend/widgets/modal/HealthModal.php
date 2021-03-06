<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Accordion;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class HealthModal extends BaseModal
{
    public $title = 'Здоровье';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];

    public $options = [
        'id' => 'modalHealth',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-health-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent ()
    {
        $content =
            Html::tag('p', 'Cтрахование жизни и здоровья от несчастных случаев – это надежный способ позаботиться о себе и своих близких.').
            Html::tag('p', 'Данный вид страхования заключается в том, что он предоставляет широкий выбор вариантов!').
            Html::tag('p', 'Вы можете самостоятельно решить на какую сумму заключить договор, ориентируясь на свой доход, учитывая риски необходимые и принимая во внимание свой образ жизни.').
            Accordion::widget([
                'items' => [
                    [
                        'label' => 'Анти клещ страхование от укуса клеща',
                        'content' => Html::tag('p', 'В соответствии с базовой программой ОМС экстренная (то есть при укусе) профилактика иммуноглобулином против клещевого вирусного энцефалита может проводиться за счет средств обязательного медицинского страхования, но строго по показаниям врача.').
                            Html::tag('p', 'Полис на случай укуса клеща гарантирует своевременное его иследование и назначение необходимого лечения. Полисом покрываются затраты и на лечение и на иследование.'),
                    ],
                    [
                        'label' => 'ДМС',
                        'content' => Html::tag('p', 'Полис ДМС – это добровольное медицинское страхование с целью получения качественной медицинской помощи, которую страховая компания организует только в современных клиниках России с новейшим оборудованием и лучшими специалистами.').
                            Html::tag('p', 'При покупке полиса ДМС Вы можете выбрать как необходимый спектр медицинских услуг (например, поликлинические, стоматологические, стационарные), так и ограниченный объем покрытия (например, на случай лечения заболеваний при укусе иксодовым клещом).')
                    ]
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