<?php

namespace frontend\services\mail;

use Yii;
use yii\base\BaseObject;

class FeedbackSendingMailService extends BaseObject
{

    //TODO: это

    public $view = 'calculate-osago-html';

    public $data;

    protected function buildData($model)
    {
        return $model;
    }

    public function send($model)
    {

        $message = Yii::$app->mailer->compose($this->view, ['data' => $this->buildData($model)])
            ->setTo(Yii::$app->params['mailer.sendTo'])
            ->setFrom(Yii::$app->params['mailer.senderFrom'])
            ->setSubject('Обратная связь');


        return $message->send();
    }
}