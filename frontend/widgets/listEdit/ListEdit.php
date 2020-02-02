<?php

namespace frontend\widgets\listEdit;

use frontend\components\helpers\Html;
use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

abstract class ListEdit extends Widget
{
    /** @var string */
    public $pluginName = 'listEdit';

    /** @var array */
    public $pluginOptions = [];

    /** @var array */
    public $options = [
        'class' => 'list-edit',
    ];

    /** @var string */
    public $template = "{items}\n{actions}";

    /** @var array */
    public $items = [];

    public $templateItem;

    /**
     * @var ListEditAction[]|array
     */
    public $actions = [];

    /**
     * @var ListEditItemAction[]|array
     */
    public $itemActions = [];

    public $inputBaseName = '';

    public $itemsContainerCssClass = 'list-edit__items';

    public $templateItemCssClass = 'list-edit__item--template';

    public $itemCssClass = 'list-edit__item';

    public $actionsContainerCssClass = 'list-edit__actions';

    public function init()
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }

        if (!isset($this->pluginOptions['itemCssClass']) && !empty($this->itemCssClass))
            $this->pluginOptions['itemCssClass'] = $this->itemCssClass;

        $this->initActions();
        $this->initItemActions();
    }

    public function run()
    {
        parent::run();
        $content = $this->renderWidget();
        $this->registerAssets();
        return $content;
    }

    /**
     * @return string
     */
    protected function renderWidget()
    {
        $content = strtr($this->template, [
            '{items}' => $this->renderItems(),
            '{actions}' => $this->renderActions(),
        ]);

        return Html::tag('div', $content, $this->options);
    }

    /**
     * @return string
     */
    protected function renderItems()
    {
        $itemsContent = [
            $this->renderTemplateItem()
        ];
        foreach ($this->items as $i => $item) {
            $itemsContent[] = $this->renderItem($i, $item);
        }

        return Html::tag('div', implode("\n", $itemsContent), ['class' => $this->itemsContainerCssClass]);
    }

    /**
     * @param integer $index
     * @param $item
     * @return string
     */
    protected function renderItem($index, $item)
    {
        return Html::tag(
            'div',
            $this->renderItemContent($index, $item),
            ['class' => $this->itemCssClass]
        );
    }

    /**
     * @param integer $index
     * @param $item
     * @return string
     */
    abstract protected function renderItemContent($index, $item);

    /**
     * @return string
     */
    protected function renderTemplateItem()
    {
        return Html::tag(
            'div',
            $this->renderItemContent(-1, $this->templateItem),
            ['class' => $this->templateItemCssClass]
        );
    }

    /**
     * @return string
     */
    protected function renderActions()
    {
        $actionsContent = [];
        foreach ($this->actions as $i => $action) {
            $actionsContent[] = $action->renderContent();
        }

        return Html::tag('div', implode("", $actionsContent), ['class' => $this->actionsContainerCssClass]);
    }

    /**
     * @param $item
     * @return string
     */
    protected function renderItemActions($item)
    {
        $actionsContent = [];
        foreach ($this->itemActions as $i => $action) {
            $actionsContent[] = $action->renderContent($item);
        }

        return Html::tag('div', implode("", $actionsContent), ['class' => 'list-edit__item-actions']);
    }


    /**
     * @throws InvalidConfigException
     */
    protected function initActions()
    {
        foreach ($this->actions as $i => $action) {
            if (is_array($action)) {
                $action = Yii::createObject($action);
            }
            if (!$action instanceof ListEditAction)
                throw new InvalidConfigException('Action in actions must be instance of ListEditAction');

            $action->attachTo($this);
            $this->actions[$i] = $action;
        }
    }

    /**
     * @throws InvalidConfigException
     */
    protected function initItemActions()
    {
        foreach ($this->itemActions as $i => $action) {
            if (is_array($action)) {
                $action = Yii::createObject($action);
            }
            if (!$action instanceof ListEditItemAction)
                throw new InvalidConfigException('Action in itemActions must be instance of ListEditItemAction');

            $action->attachTo($this);
            $this->itemActions[$i] = $action;
        }
    }

    protected function registerAssets()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        $pluginName = $this->pluginName;

        $options = $this->pluginOptions;

        $options['actions'] = [];
        foreach ($this->actions as $i => $action) {
            if (isset($action->jsClassName)) {
                $classOptions = Json::encode($action->jsClassOptions);
                $options['actions'][] = new JsExpression("new {$action->jsClassName}({$classOptions})");
            }
        }

        $options['itemActions'] = [];
        foreach ($this->itemActions as $i => $action) {
            if (isset($action->jsClassName)) {
                $classOptions = Json::encode($action->jsClassOptions);
                $options['itemActions'][] = new JsExpression("new {$action->jsClassName}({$classOptions})");
            }
        }

        $options = Json::encode($options);

        $js = "jQuery('#{$id}').{$pluginName}({$options});";
        $view->registerJs($js, View::POS_READY);
    }

    protected function getInputName($index, $attribute)
    {
        return $this->inputBaseName."[{$index}][{$attribute}]";
    }

    protected function getInputId($name)
    {
        return str_replace(['[]', '][', '[', ']', ' ', '.'], ['', '-', '-', '', '-', '-'], $name);
    }
}