<?php

namespace frontend\models\interfaces;


interface StaticListInterface
{
    public static function getArray();

    public static function getList();

    public static function getIds();

    public static function getName($id);
}