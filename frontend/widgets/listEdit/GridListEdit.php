<?php

namespace frontend\widgets\listEdit;

use frontend\components\helpers\Html;

abstract class GridListEdit extends ListEdit
{
    public $pluginOptions = [
//      'templateItemSelector' => 'tbody > .list-edit__item--template',
//      'itemSelector' => 'tbody > .list-edit__item',
    ];

    public $itemsContainerCssClass = 'table list-edit__items';

    /**
     * @return string
     */
    protected function renderTableHeader()
    {
        return Html::tag('thead', $this->renderTableHeaderContent(), []);
    }

    /**
     * @return string
     */
    abstract protected function renderTableHeaderContent();

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

        $body = Html::tag('tbody', implode("\n", $itemsContent), []);

        return Html::tag(
            'table',
            $this->renderTableHeader().$body,
            ['class' => $this->itemsContainerCssClass]
        );
    }

    protected function renderTemplateItem()
    {
        return Html::tag(
            'tr',
            $this->renderItemContent(-1, $this->templateItem),
            ['class' => $this->templateItemCssClass]
        );
    }

    /**
     * @param integer $index
     * @param $item
     * @return string
     */
    protected function renderItem($index, $item)
    {
        return Html::tag(
            'tr',
            $this->renderItemContent($index, $item),
            ['class' => $this->itemCssClass]
        );
    }
}