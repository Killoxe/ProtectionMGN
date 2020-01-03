<?php

namespace frontend\components\helpers;

use yii\helpers\ArrayHelper;

class Html extends \yii\bootstrap\Html
{
    public static function icon($name, $options = [])
    {
        $classPrefix = ArrayHelper::remove($options, 'prefix', 'app-icon app-icon-');
        $options['prefix'] = $classPrefix;

        return parent::icon($name, $options);
    }
}