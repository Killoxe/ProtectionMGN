<?php

namespace frontend\widgets\listEdit;

use yii\base\BaseObject;

abstract class ListEditExtension extends BaseObject
{
    /** @var ListEdit */
    protected $listEdit;

    /** @var array */
    public $jsClassOptions = [];

    /** @var string */
    public $jsClassName;

    /**
     * @param ListEdit $listEdit
     */
    public function attachTo($listEdit)
    {
        $this->listEdit = $listEdit;
    }
}