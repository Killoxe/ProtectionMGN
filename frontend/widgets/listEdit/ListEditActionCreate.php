<?php

namespace frontend\widgets\listEdit;

use frontend\components\helpers\Html;

class ListEditActionCreate extends ListEditAction
{
    public $options = [
        'class' => 'btn btn-primary list-edit__btn-create'
    ];

    public $jsClassOptions = [
        'selector' => '.list-edit__btn-create'
    ];

    public $jsClassName = 'ListEditActionCreate';

    public $text = 'Добавить';

    /**
     * @return string
     */
    public function renderContent()
    {
       return Html::a($this->text, null, $this->options);
    }
}