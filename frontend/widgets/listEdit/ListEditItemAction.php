<?php

namespace frontend\widgets\listEdit;

abstract class ListEditItemAction extends ListEditExtension

{
    /**
     * @param $item
     * @return string
     */
    abstract public function renderContent($item);
}