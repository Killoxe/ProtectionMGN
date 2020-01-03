<?php
namespace frontend\services\mail;

use Yii;
use yii\base\BaseObject;

class CalculateOsagoSendingMailServiceFactory extends BaseObject
{
    public function get()
    {
        /** @var CalculateOsagoSendingMailService $mail */
        $mail = Yii::createObject(CalculateOsagoSendingMailService::class);
        return $mail;
    }
}