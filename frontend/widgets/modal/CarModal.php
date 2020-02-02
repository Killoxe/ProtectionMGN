<?php
namespace frontend\widgets\modal;

use frontend\components\helpers\Html;
use frontend\widgets\Button;
use frontend\widgets\Collapse;
use frontend\widgets\modal\base\BaseModal;
use frontend\widgets\Accordion;
use yii\helpers\Json;
use yii\web\View;

class CarModal extends BaseModal
{
    public $title = 'Автомобили';

    public $toggleButton = [
        'tag' => 'a',
        'label' => 'ПОДРОБНЕЕ'
    ];

    public $options = [
        'id' => 'modalCar',
    ];

    public $size = self::SIZE_LARGE;

    public $headerOptions = [
        'class' => 'modal-car-header'
    ];

    public $bodyOptions = [
        'class' => 'modal__card'
    ];

    protected function renderBodyContent ()
    {
        $content =
            Accordion::widget([
                'items' => [
                    [
                        'label' => 'ОСАГО',
                        'content' => Html::tag('p', 'Полис ОСАГО — это обязательное страхование автогражданской 
                                ответственности за причинение вреда жизни, здоровью и имуществу третьих лиц (пассажиров и пешеходов). 
                                Имущество третих лиц — это любые материальные ценности, которые повредила ваша машина (чужое ТС, строение, забор и тд.).').
                            Html::tag('p', 'Полис позволит компенсировать ущерб, который Вы как водительпричинили 
                                имуществу и здоровью третьих лиц (пассажиров и пешеходов).'),
                    ],
                    [
                        'label' => 'КАСКО',
                        'content' => Html::tag('p', 'Полис КАСКО — это защита от таких рисков, как угон, хищение, 
                                повреждение Вашего автомобиля, риски повреждения автомобиля отскочившим предметом, наездом на препятствия,
                                 противоправные действия третьих лиц, стихийные бедствия и многое другое. При выборе полиса КАСКО всегда 
                                 можно подобрать перечень рисков, которые будут актуальны именно для Вашего авто.')
                    ],
                    [
                        'label' => 'Защита',
                        'content' => Html::tag('p', 'Полис Защита гарантирует получение выплаты в случае, когда виновник ДТП эксплуатировал ТС,
                                не имея полиса ОСАГО.')
                    ]
                ]
            ]).
            Button::widget([
                'text' => 'ОФОРМИТЬ',
                'options' => [
                    'class' => 'btn-in-modal',
                    'data' => [
                        'toggle' => 'modal',
                        'target' => '#calculate-osago-modal'
                    ]
                ],
            ]);

        return $content;
    }
}