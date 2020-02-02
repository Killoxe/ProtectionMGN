<?php
namespace frontend\widgets;

use frontend\components\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

class Accordion extends \yii\bootstrap4\Widget
{
    /** @var array */
    public $items = [];

    /** @var array */
    public $pluginOptions = [
        'itemSelector' => '.accordion__item',
        'labelSelector' => '.accordion__item--header',
        'contentSelector' => '.accordion__item--content'
    ];

    public function run()
    {
        $content = $this->renderWidget();
        $this->registerAssets();
        return $content;
    }

    protected function renderWidget()
    {
        Html::addCssClass($this->options, 'accordion');
        return Html::beginTag('div', $this->options).
            $this->renderItems().
        Html::endTag('div');
    }

    protected function renderItems()
    {
        foreach ($this->items as $key => $item) {
            $options = $item['itemOptions'];
            $options['data'] = [
                'key' => $key
            ];
            $isShow = isset($options['show']) ? ($options['show'] ? 'block' : 'none') : 'none';
            Html::addCssClass($options, 'accordion__item');

            $items[] = Html::beginTag('div', $options).
                Html::tag('div', $item['label'], ['class' => 'accordion__item--header']).
                Html::tag('div', $item['content'], ['class' => 'accordion__item--content', 'style' => ['display' => $isShow]]).
            Html::endTag('div');
        }

        return implode('', $items);
    }

    protected function registerAssets()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        $options = Json::encode($this->pluginOptions);

        $js = "jQuery('#{$id}').accordionWidget({$options})";
        $view->registerJs($js, View::POS_READY);
    }
}