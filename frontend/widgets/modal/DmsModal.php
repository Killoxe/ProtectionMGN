<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Button;
use frontend\widgets\modal\base\BaseModal;

class DmsModal extends BaseModal
{
    public $title = 'Страхование сотрудников предприятия';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];


    public $options = [
        'id' => 'modalDMS',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-dms-header',
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent()
    {
        $content =
            Html::tag('p', 'Страхование сотрудников предприятия – одна из важных составляющих имиджа успешной компании и привлекательности работодателя. Своим клиентам мы предлагаем программы Добровольного медицинского страхования, Международного медицинского страхования и страхования от Несчастного случая и болезней.').
            Html::tag('p', 'Страхование работников на предприятии обеспечивает комплексную защиту организации от экономических последствий. При наступлении несчастного случая сотруднику будет выплачена компенсация, сама фирма при этом не понесёт финансовых потерь.').
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