<?php
namespace frontend\widgets;

use yii\bootstrap4\Widget;
use frontend\components\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\View;

class WeAreInRegion extends Widget
{
    /** @var string */
    public $pluginName = 'weAreInRegion';

    /** @var array */
    public $options = [
        'class' => 'row map tb3in5',
        'id' => 'map'
    ];

    /** @var int */
    public $displayedMapId = 0;

    /** @var array  */
    public $pluginOptions = [
        'mapListSelector' => '.map__link',
        'buttonShowInMapSelector' => '.btn__show-in-map',
    ];


    public function init()
    {
        parent::init();
        $this->pluginOptions['displayedMapId'] = $this->displayedMapId;
    }

    public function run ()
    {
        parent::run();
        $content = $this->renderWidget();
        $this->registerAssets();
        return $content;
    }

    protected function renderWidget()
    {
        $content =
            '<div class="h1">Мы в Регионе</div>
            <div class="map__wrap">'.
                $this->renderMapContacts().
                $this->renderMapLink().
            '</div>';

        return Html::tag('div', $content, $this->options);
    }

    protected function renderMapContacts()
    {
        return '<div class="map__contacts">
            <div class="contacts">
                <div class="contacts__card">
                    <h3>Магнитогорск</h3>
                    <h4 class="contacts__address">ул. Советской Армии, 39</h4>
                    <div class="contacts__info">
                        <div class="contacts__date">
                            <span>пн - пт:<br>сб:<br>вс:</span>
                            <span>c 9:00 - 18:00<br>c 11:00 - 16:00<br>ВЫХОДНОЙ</span>
                        </div>
                        <div class="contacts__phone">
                            <span>тел:</span>
                            <span><a href="tel:89068546008">8 (906) 854-60-08</a><br><a href="tel:89190950666">8 (919) 095-06-66</a><br><a href="tel:434000">43-40-00</a></span>
                        </div>
                    </div>'.
                    Html::a("Показать на карте", null, ["class" => "btn__show-in-map", "data" => ["map-id" => 0]]).
                '</div>

                <div class="contacts__card">
                    <h3>Троицк</h3>
                    <h4 class="contacts__address">ул. Гагарина, 74</h4>
                    <div class="contacts__info">
                        <div class="contacts__phone">
                            <span>тел:</span>
                            <span><a href="tel:89227566494">8 (922) 756-64-94</a></span>
                        </div>
                    </div>'.
                    Html::a("Показать на карте", null, ["class" => "btn__show-in-map", "data" => ["map-id" => 1]]).
                    '<h4 class="contacts__address">ул. Тони Меньшениной, 34</h4>
                    <div class="contacts__info">
                        <div class="contacts__phone">
                            <span>тел:</span>
                            <span><a href="89518051834">8 (951) 805-18-34</a></span>
                        </div>
                    </div>'.
                    Html::a("Показать на карте", null, ["class" => "btn__show-in-map", "data" => ["map-id" => 2]]).
                '</div>

                <div class="contacts__card">
                    <h3>Челябинск</h3>
                    <h4 class="contacts__address">ул. Троицкая, 18, корпус 2</h4>
                    <div class="contacts__info">
                        <div class="contacts__phone">
                            <span>тел:</span>
                            <span><a href="tel:83512232413">8 (351) 223-24-13</a></span>
                        </div>
                    </div>'.
                    Html::a("Показать на карте", null, ["class" => "btn__show-in-map", "data" => ["map-id" => 3]]).
                '</div>

                <div class="contacts__card">
                    <h3>Карталы</h3>
                    <h4 class="contacts__address">ул. Пушкина, 6А</h4>
                    <div class="contacts__info">
                        <div class="contacts__phone">
                            <span>тел:</span>
                            <span><a href="tel:89512555150">8 (951) 255-51-50</a></span>
                        </div>
                    </div>'.
                    Html::a("Показать на карте", null, ["class" => "btn__show-in-map", "data" => ["map-id" => 4]]).
                '</div>

            </div>
        </div>';
    }

    protected function renderMapLink()
    {
        $this->pluginOptions['srcItems'] = [
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2379.3555751370322!2d58.98232761597788!3d53.390578979098045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d12f03ca1e5d8d%3A0xc6bb3e9b7f2a8498!2z0YPQuy4g0KHQvtCy0LXRgtGB0LrQvtC5INCQ0YDQvNC40LgsIDM5LCDQnNCw0LPQvdC40YLQvtCz0L7RgNGB0LosINCn0LXQu9GP0LHQuNC90YHQutCw0Y8g0L7QsdC7LiwgNDU1MDM3!5e0!3m2!1sru!2sru!4v1578195917313!5m2!1sru!2sru',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2340.392133613661!2d61.54398311599778!3d54.08452252686255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43ce4e53815f870f%3A0x35c58544c3cf9ca0!2z0YPQuy4g0JPQsNCz0LDRgNC40L3QsCwgNzQsINCi0YDQvtC40YbQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTcxMDM!5e0!3m2!1sru!2sru!4v1578196053012!5m2!1sru!2sru',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2340.4903471955067!2d61.513870215997756!3d54.08278102699423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43ce4ee52ca834f9%3A0xb580bcfbc89700df!2z0KLQvtC90Lgg0JzQtdC90YzRiNC10L3QuNC90L7QuSDRg9C7LiwgMzQsINCi0YDQvtC40YbQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTcxMDM!5e0!3m2!1sru!2sru!4v1578196104209!5m2!1sru!2sru',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2280.9466163357665!2d61.381516516028036!3d55.13171194718786!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c58d66e89d4415%3A0x3378646f70457396!2z0YPQuy4g0KLRgNC-0LjRhtC60LDRjywgMTgsINCn0LXQu9GP0LHQuNC90YHQuiwg0KfQtdC70Y_QsdC40L3RgdC60LDRjyDQvtCx0LsuLCA0NTQwODc!5e0!3m2!1sru!2sru!4v1578303657591!5m2!1sru!2sru',
            'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2397.947141132672!2d60.638638215968356!3d53.05725720402603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43d22de19c5f71c9%3A0xe9fa12d5feadef2b!2z0YPQuy4g0J_Rg9GI0LrQuNC90LAsIDYsINCa0LDRgNGC0LDQu9GLLCDQp9C10LvRj9Cx0LjQvdGB0LrQsNGPINC-0LHQuy4sIDQ1NzM1MQ!5e0!3m2!1sru!2sru!4v1578196202366!5m2!1sru!2sru'
        ];

        return Html::beginTag('div', ['class' => 'map__link']).
            Html::tag('iframe', null, [
                'src' => '',
                'width' => '100%',
                'height' => '100%',
                'frameborder' => '0',
                'style' => [
                    'border' => 0,
                    'position' => 'absolute'
                ],
                'allowfullscreen' => '',
            ]).
        Html::endTag('div');
    }

    protected function registerAssets()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        $pluginName = $this->pluginName;

        $options = Json::encode($this->pluginOptions);

        $js = "jQuery('#{$id}').{$pluginName}({$options});";
        $view->registerJs($js, View::POS_READY);
    }
}