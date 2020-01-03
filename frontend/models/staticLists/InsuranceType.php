<?php
namespace frontend\models\staticLists;

use frontend\models\base\StaticList;

class InsuranceType extends StaticList
{
    const BOI = 0;

    public static function getArray ()
    {
        return [
            ['id' => self::BOI, 'name' => 'boi']
        ];
    }
}