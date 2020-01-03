<?php

namespace frontend\models\staticLists;

use frontend\models\base\StaticList;

class Registration extends StaticList
{
    public static function getArray ()
    {
        return [
            ['id' => 0, 'name' => 'Челябинская область, г. Магнитогорск'],
            ['id' => 1, 'name' => 'Челябинская область, г. Челябинск'],
            ['id' => 2, 'name' => 'Челябинская область, сельская(поселок/деревня)'],
            ['id' => 3, 'name' => 'Респ. Башкортостан, сельская(поселок/деревня)'],
            ['id' => 4, 'name' => 'Другая']
        ];
    }
}