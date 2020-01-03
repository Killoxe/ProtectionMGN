<?php

namespace frontend\widgets\listEdit;


use frontend\components\helpers\Html;

class ListEditItemActionDelete extends ListEditItemAction
{
    public $options = [
        'class' => 'btn btn-dark-grey btn-icon--small list-edit__btn-delete'
    ];

    public $jsClassOptions = [
        'selector' => '.list-edit__btn-delete'
    ];

    public $jsClassName = 'ListEditActionDelete';

    /**
     * @param $item
     * @return string
     */
    public function renderContent($item)
    {
        //TODO: воткнуть иконку
        return Html::a('Удалить водителя', null, $this->options); /*Html::icon('clear')*/
    }
}