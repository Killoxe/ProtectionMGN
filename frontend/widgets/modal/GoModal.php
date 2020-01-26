<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class GoModal extends BaseModal
{
    public $title = 'Страхование гражданской ответственности';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];


    public $options = [
        'id' => 'modalGO',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-go-header',
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent()
    {
        $content =
            Html::tag('p', 'Защита бизнеса от непредвиденных расходов, связанных с обязанностью компенсировать ущерб третьим лицам, которой может быть нанесен в результате деятельности бизнеса.').
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