<?php

namespace frontend\services\base;

use yii\base\BaseObject;
use yii\base\Model;
use yii\helpers\ArrayHelper;

abstract class ModelRelationService extends BaseObject
{
//
//    /** @var Model */
//    public $model;
//
//    /** @var $string */
//    public $relation;
//
//    /**
//     * @param string[] $key
//     * @param $item
//     * @return null|string
//     */
//    protected function getKeyValue($key, $item)
//    {
//        $value = [];
//        foreach ($key as $name) {
//            $values[$name] = ArrayHelper::getValue($item, $name);
//        }
//        return implode('_', $values);
//    }
//
//    /**
//     * @param $query
//     * @param $key
//     * @return mixed
//     */
//    protected function getItemsIndexedByKey($query, $key)
//    {
//        return $query->indexBy(function ($row) use ($key) {
//            return $this->getKeyValue($key, $row);
//        })->all();
//    }
//
}