<?php
namespace frontend\widgets\CalculateOsagoFormPeopleListEdit;

use frontend\widgets\listEdit\ListEdit;
use frontend\components\helpers\Html;
use frontend\widgets\listEdit\ListEditActionCreate;
use frontend\widgets\listEdit\ListEditItemActionDelete;
use kartik\date\DatePicker;

class CalculateOsagoFormPeopleListEdit extends ListEdit
{
    /** @var array $options */
    public $options = [
        'class' => 'list-edit calculateosagoform-people-list-edit'
    ];

    public $pluginOptions = [
        'itemsContainerSelector' => '.calculateosagoform-people-list-edit__items',
        'templateItemSelector' => '.calculateosagoform-people-list-edit__items > .list-edit__item--template',
        'itemSelector' => '.calculateosagoform-people-list-edit__items > .list-edit__item',
        'actionsContainerSelector' => '.calculateosagoform-people-list-edit__actions',
        'itemPluginName' =>  'calculateOsagoFormPeopleListEditItem',
    ];

    public $inputBaseName = 'CalculateOsagoForm[people]';

    public $itemsContainerCssClass = 'list-edit__items calculateosagoform-people-list-edit__items';

    public $actionsContainerCssClass = 'list-edit__actions calculateosagoform-people-list-edit__actions';

    public $itemLabelCssClass = 'list-edit__item-label';

    public function init()
    {
        $this->actions = [
            [
                'class' => ListEditActionCreate::class,
                'text' => Html::icon('add').'&nbsp;'.'Добавить водителя',
                'options' => [
                    'class' => 'list-edit__btn-create null'
                ],
                'jsClassName' => 'ListEditActionCreate'
            ]
        ];

        $this->itemActions = [
            [
                'class' => ListEditItemActionDelete::class,
                'textButton' => Html::tag('span', 'Удалить водителя'),
                'options' => [
                    'class' => 'btnn list-edit__btn-delete calculateosagoform-people-list-edit__btn-delete'
                ],
                'jsClassOptions' => [
                    'selector' => '.calculateosagoform-people-list-edit__btn-delete'
                ],
                'jsClassName' => 'CalculateOsagoFormPeopleListEditActionDelete'
            ],
        ];

        parent::init();
    }

    /**
     * @return string
     */
    protected function renderItems()
    {
        $itemsContent =
            $this->renderTemplateItem().
            $this->renderItem(0, $this->items);

        return Html::tag('div', $itemsContent, ['class' => $this->itemsContainerCssClass]);
    }

    /**
     * @param integer $index
     * @param RecipeIngredient $item
     * @return string
     */
    protected function renderItemContent($index, $item)
    {
        $content =
            $this->renderItemLabel($index).
            $this->renderDateBirthInput($index, $item).
            $this->renderDriverLicenseSeries($index, $item).
            $this->renderDriverLicenseNumber($index, $item).
            $this->renderDateBeginExperience($index, $item).
            $this->renderItemActions($item);

        return $content;
    }

    protected function renderItemLabel($index)
    {
        $number = $index + 1;
        return Html::tag('div', "Водитель #$number", ['class' => $this->itemLabelCssClass]);
    }

    protected function renderDateBirthInput($index, $item)
    {
        $name = $this->getInputName($index, 'date_birth');
        $id = $this->getInputId($name);
        $label =
            Html::label($item->getAttributeLabel('date_birth'), null, ['class' => 'control-label']).
            Html::tag('div', null, ['class' => 'required-icon']);
        $input = DatePicker::widget([
            'name' => $name,
            'attribute' => 'date_birth',
            'options' => [
                'id' => $id,
                'class' => 'calculateosagoform-people-date_birth-input',
                'autocomplete' => 'off',
                'placeholder' => 'Выберите дату',
            ],
        ]);
        $error = Html::tag('p', '', ['class' => 'help-block help-block-error']);

        return Html::tag('div', $label.$input.$error, []);
    }

    protected function renderDriverLicenseSeries($index, $item)
    {
        $name = $this->getInputName($index, 'driver_license_series');
        $id = $this->getInputId($name);
        $label =
            Html::label($item->getAttributeLabel('driver_license_series'), null, ['class' => 'control-label']).
            Html::tag('div', null, ['class' => 'required-icon']);
        $input = Html::input('text', $name, null, [
            'id' => $id,
            'class' => 'form-control calculateosagoform-driver_license_series-input',
            'placeholder' => 'Ваш ответ',
        ]);

        $error = Html::tag('p', '', ['class' => 'help-block help-block-error']);

        return Html::tag('div', $label.$input.$error, []);
    }

    protected function renderDriverLicenseNumber($index, $item)
    {
        $name = $this->getInputName($index, 'driver_license_number');
        $id = $this->getInputId($name);
        $label =
            Html::label($item->getAttributeLabel('driver_license_number'), null, ['class' => 'control-label']).
            Html::tag('div', null, ['class' => 'required-icon']);
        $input = Html::input('text', $name, null,  [
            'id' => $id,
            'class' => 'form-control calculateosagoform-driver_license_number-input',
            'placeholder' => 'Ваш ответ'
        ]);

        $error = Html::tag('p', '', ['class' => 'help-block help-block-error']);

        return Html::tag('div', $label.$input.$error, []);
    }

    protected function renderDateBeginExperience($index, $item)
    {
        $name = $this->getInputName($index, 'date_begin_experience');
        $id = $this->getInputId($name);
        $label =
            Html::label($item->getAttributeLabel('date_begin_experience'), null, ['class' => 'control-label']).
            Html::tag('div', null, ['class' => 'required-icon']);
        $input = DatePicker::widget([
            'name' => $name,
            'attribute' => 'date_begin_experience',
            'options' => [
                'id' => $id,
                'class' => 'calculateosagoform-date_begin_experience-input',
                'placeholder' => 'Выберите дату',
                'autocomplete' => 'off',
            ],
        ]);
        $error = Html::tag('p', '', ['class' => 'help-block help-block-error']);

        return Html::tag('div', $label.$input.$error, []);
    }
}