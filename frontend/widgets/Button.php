<?php
namespace frontend\widgets;

use frontend\components\helpers\Html;
use yii\bootstrap4\Widget;
use yii\helpers\Json;
use yii\web\View;

class Button extends Widget
{
    /** @var string */
    public $text;

    public function run()
    {
        return $this->renderWidget();
    }

    protected function renderWidget()
    {
        Html::addCssClass($this->options, 'btnn');

        $content = [
            Html::beginTag('div', $this->options),
                Html::tag('span', $this->text),
            Html::endTag('div')
        ];

        return implode('', $content);
    }
}