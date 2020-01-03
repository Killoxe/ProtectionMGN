<?php

namespace frontend\widgets\listEdit;

abstract class ListEditAction extends ListEditExtension
{
    /**
     * @return string
     */
    abstract public function renderContent();
}