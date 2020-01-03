<?php

namespace frontend\models\base;

use frontend\models\interfaces\StaticListInterface;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

abstract class StaticList extends BaseObject implements StaticListInterface
{
    public static function getArray()
    {
        return [];
    }

    public static function getList()
    {
        return ArrayHelper::map(static::getArray(), 'id', 'name');
    }

    public static function getIds()
    {
        return ArrayHelper::getColumn(static::getArray(), 'id');
    }

    public static function getName($id)
    {
        return ArrayHelper::getValue(static::getList(), $id, null);
    }
}