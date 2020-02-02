<?php
namespace frontend\models\staticLists;

use frontend\models\base\StaticList;

class HorsePower extends StaticList
{
    public static function getArray ()
    {
        return [
            ['id' => 0, 'name' => 'до 50 л.c.'],
            ['id' => 1, 'name' => 'от 51 до 70 л.с.'],
            ['id' => 2, 'name' => 'от 71 до 100 л.с.'],
            ['id' => 3, 'name' => 'от 101 до 120 л.с.'],
            ['id' => 4, 'name' => 'от 121 до 150 л.с.'],
            ['id' => 5, 'name' => 'от 150 л.с.']
        ];
    }
}