<?php
namespace frontend\widgets\listEdit;


use frontend\components\helpers\Html;

class ListEditItemActionMove extends ListEditItemAction
{
    public $options = [
        'class' => 'btn btn-dark-grey btn-icon--small list-edit__btn-move'
    ];

    public $jsClassOptions = [
        'selector' => '.list-edit__btn-move'
    ];

    public $jsClassName = 'ListEditActionMove';

    /**
     * @param $item
     * @return string
     */
    public function renderContent($item)
    {
        return Html::a(Html::icon('more_vert'), ['#'], $this->options);
    }
}