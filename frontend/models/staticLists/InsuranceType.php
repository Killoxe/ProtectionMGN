<?php
namespace frontend\models\staticLists;

use frontend\models\base\StaticList;
use yii\helpers\ArrayHelper;

class InsuranceType extends StaticList
{
    const FOR_FIZ_LIC = 'Для физ. лиц';
    const FOR_UR_LIC = 'Для юр. лиц';

    const CARS = 'Автомобили';
    const CASCO = 0;
    const OSAGO = 1;
    const PRODLENIE = 2;

    const HOUSING = 'Жилье';
    const APARTMENT = 4;
    const HOUSE = 5;
    const MORTGAGE = 6;
    const CIVIL_RESPONSIBILITY = 7;

    const TRAVELS = 'Путешествия';
    const VZR = 8;
    const FROM_RECOGNIZANCE = 9;

    const HEALTH = 'Здоровье';
    const MITE = 10;
    const NS = 11;
    const DMS = 12;

    const TOURS = 'Туры';
    const ABROAD = 13;
    const IN_RUSSIA = 14;

    const CARGO = 'Грузы';
    const AUTO = 15;
    const TRAIN = 16;
    const SHIPPING = 17;

    const PROPERTY_OF_LEGAL_ENTITIES = 'Имущество Юр. лиц';
    const BUILDING = 18;
    const EQUIPMENT = 19;
    const OFFICE = 20;
    const OFFICE_EQUIPMENT = 21;
    const PRODUCTS = 22;
    const GOODS = 23;
    const RAW_MATERIALS = 24;

    const OPO = 'ОПО';
    const GAS_STATIONS = 25;
    const ELEVATORS = 26;
    const ESCALATORS = 27;

    const GO = 'ГО';
    const NON_RESIDENTIAL_PROPERTY_OWNERS = 28;
    const EVENT_ORGANIZERS = 29;
    const CAR_PARKS = 30;
    const OWNERS_OF_TEMPORARY_STORAGE_WAREHOUSES = 31;

    const AUTO_AND_SPECIAL_AUTO = 'Авто и спецтехника';
    const ALL_KINDS = 32;

    public static function getArray()
    {
        return [
            ['id' => self::CASCO, 'name' => 'Каско', 'group' => self::CARS],
            ['id' => self::OSAGO, 'name' => 'ОСАГО', 'group' => self::CARS],
            ['id' => self::PRODLENIE, 'name' => 'Продление', 'group' => self::CARS],

            ['id' => self::APARTMENT, 'name' => 'Квартира', 'group' => self::HOUSING],
            ['id' => self::HOUSE, 'name' => 'Дом', 'group' => self::HOUSING],
            ['id' => self::MORTGAGE, 'name' => 'Ипотека', 'group' => self::HOUSING],
            ['id' => self::CIVIL_RESPONSIBILITY, 'name' => 'Гр. ответсвтвенность', 'group' => self::HOUSING],

            ['id' => self::VZR, 'name' => 'ВЗР', 'group' => self::TRAVELS],
            ['id' => self::FROM_RECOGNIZANCE, 'name' => 'От невыезда', 'group' => self::TRAVELS],

            ['id' => self::MITE, 'name' => 'Клещ', 'group' => self::HEALTH],
            ['id' => self::NS, 'name' => 'Н/С', 'group' => self::HEALTH],
            ['id' => self::DMS, 'name' => 'ДМС', 'group' => self::HEALTH],

            ['id' => self::ABROAD, 'name' => 'За границу', 'group' => self::TOURS],
            ['id' => self::IN_RUSSIA, 'name' => 'По России', 'group' => self::TOURS],

            ['id' => self::AUTO, 'name' => 'Авто', 'group' => self::CARGO],
            ['id' => self::TRAIN, 'name' => 'ЖД', 'group' => self::CARGO],
            ['id' => self::SHIPPING, 'name' => 'Судоходные', 'group' => self::CARGO],

            ['id' => self::BUILDING, 'name' => 'Здания', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::EQUIPMENT, 'name' => 'Оборудование', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::OFFICE, 'name' => 'Офис', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::OFFICE_EQUIPMENT, 'name' => 'Офисная техника', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::PRODUCTS, 'name' => 'Продукты', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::GOODS, 'name' => 'Товары', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],
            ['id' => self::RAW_MATERIALS, 'name' => 'Сырье', 'group' => self::PROPERTY_OF_LEGAL_ENTITIES],

            ['id' => self::GAS_STATIONS, 'name' => 'Автозаправочные станции', 'group' => self::OPO],
            ['id' => self::ELEVATORS, 'name' => 'Лифты', 'group' => self::OPO],
            ['id' => self::ESCALATORS, 'name' => 'Экскалаторы', 'group' => self::OPO],

            ['id' => self::NON_RESIDENTIAL_PROPERTY_OWNERS, 'name' => 'Cобственников нежилых помещений', 'group' => self::GO],
            ['id' => self::EVENT_ORGANIZERS, 'name' => 'Организаторы массовых мероприятий', 'group' => self::GO],
            ['id' => self::CAR_PARKS, 'name' => 'Автостоянки', 'group' => self::GO],
            ['id' => self::OWNERS_OF_TEMPORARY_STORAGE_WAREHOUSES, 'name' => 'Владельцы складов временного хранения', 'group' => self::GO],

            ['id' => self::ALL_KINDS, 'name' => 'Все виды', 'group' => self::AUTO_AND_SPECIAL_AUTO],
        ];
    }

    public static function getToSelect2()
    {
        $rawList = ArrayHelper::map(static::getArray(), 'id', 'name', 'group');
        return [
            self::FOR_FIZ_LIC => array_slice($rawList, 0, 5),
            self::FOR_UR_LIC => array_slice($rawList, 5)
        ];
    }

    public static function getFullPath($id)
    {
        $array = static::getArray();
        $path = [
            $array[$id]['id'] > 14 ? self::FOR_UR_LIC : self::FOR_FIZ_LIC,
            $array[$id]['group'],
            $array[$id]['name']
        ];

        return implode(' > ', $path);
    }
}