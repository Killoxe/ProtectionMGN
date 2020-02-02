<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class OpoModal extends BaseModal
{
    public $title = 'Страхование ответственности владельцев ОПО';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];


    public $options = [
        'id' => 'modalOPO',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-opo-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent()
    {
        $content =
            Html::tag('p', 'Согласно законодательству РФ, без соответствующего полиса страхования гражданской ответственности перед третьими лицами эксплуатация ОПО не допускается.').
            Html::tag('p', 'Страхование ответственности владельцев ОПО — это защита бизнеса от непредвиденных расходов, связанных с обязанностью компенсировать ущерб третьим лицам, который может быть нанесен в результате деятельности владельцев опасных производственных объектов.').
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