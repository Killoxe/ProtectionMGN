<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Accordion;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class CargoModal extends BaseModal
{
    public $title = 'Грузы';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];


    public $options = [
        'id' => 'modalCargo',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-cargo-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent()
    {
        $content =
            Html::tag('p', 'Защита бизнеса от затрат в случае непредвиденных ситуаций, наносящий серьезное повреждение или влекущих полную гибель грузов.').
            Html::tag('p', 'Современный бизнес невозможно представить без своевременных грузоперевозок — от этого зависит работа любого предприятия. Но не смотря на совершенстование транспорта и техники перевозок, различных мер по сохранности грузов, число всевозможных происшествий при транспортировке все равно остается высоким.').
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