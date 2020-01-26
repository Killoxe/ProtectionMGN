<?php

namespace frontend\models\validators;

use yii\validators\Validator;

class CalculateOsagoPeopleValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        unset($model->people[-1]);

        foreach ($model->people as $i => $people) {
            if (empty($people['date_birth']) ||
                empty($people['driver_license_series']) ||
                empty($people['driver_license_number']) ||
                empty($people['date_begin_experience'])
            ) {
                $this->addError($model, 'peopleValid', 'error');
            }
        }
    }
}