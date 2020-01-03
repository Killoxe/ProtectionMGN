<?php

namespace frontend\services\mail;

use Yii;
use yii\base\BaseObject;

class FeedbackSendingMailService extends BaseObject
{

    //TODO: это

    public $view = 'test-html';

    public $data;

    public function send($model)
    {
        /*
        $message = Yii::$app->mailer->compose($this->view, ['data' => ['mail' => $model->mail, 'text' => $model->text]])
            ->setTo(Yii::$app->params['mailer.sendTo'])
            ->setFrom(Yii::$app->params['mailer.senderFrom'])
            ->setSubject('test');
        */

        return true; //$message->send();
    }
}