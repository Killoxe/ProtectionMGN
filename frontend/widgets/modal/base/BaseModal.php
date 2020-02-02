<?php
namespace frontend\widgets\modal\base;

use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;


abstract class BaseModal extends Modal
{
    /** @var array */
    public $modalDialogOptions = [
        'class' => 'modal-dialog'
    ];

    /** @var array */
    public $modalContentOptions = [
        'class' => 'modal-content'
    ];

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        $this->modalDialogOptions['class'] = $this->modalDialogOptions['class'] . " " . $this->size;
        Html::addCssClass($this->options, 'fade');

        $this->initOptions();
    }

    public function run()
    {
        $content =
            $this->renderToggleButton().
            $this->renderModalWindow();

        $this->registerPlugin('modal');

        return $content;
    }

    protected function renderModalWindow()
    {
        $content =
            Html::beginTag('div', $this->options).
                Html::beginTag('div', $this->modalDialogOptions).
                    Html::beginTag('div', $this->modalContentOptions).
                        $this->renderHeader().
                        $this->renderBody().
                        $this->renderFooter().
                    Html::endTag('div').
                Html::endTag('div').
            Html::endTag('div');

        return $content;
    }

    protected function renderBody()
    {
        Html::addCssClass($this->bodyOptions, ['widget' => 'modal-body']);
        return Html::tag('div', $this->renderBodyContent(), $this->bodyOptions);
    }

    abstract protected function renderBodyContent();

    protected function initOptions ()
    {
        parent::initOptions();

        if ($this->toggleButton !== false) {
            if (isset($this->toggleButton['type'])) {
                unset($this->toggleButton['type']);
            }
        }
    }
}