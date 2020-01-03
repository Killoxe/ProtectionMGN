<?php
namespace frontend\services\mail;

use Yii;
use yii\base\BaseObject;

class FeedbackSendingMailServiceFactory extends BaseObject
{
    public function get()
    {
        /** @var FeedbackSendingMailService $mail */
        $mail = Yii::createObject(FeedbackSendingMailService::class);
        return $mail;
    }
}