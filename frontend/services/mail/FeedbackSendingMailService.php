<?php

namespace frontend\services\mail;


use frontend\models\staticLists\InsuranceType;
use Yii;
use frontend\models\forms\FeedbackForm;
use yii\base\BaseObject;
use yii\helpers\ArrayHelper;

class FeedbackSendingMailService extends BaseObject
{
    public $view = 'feedback-html';

    public $subject = 'Обратная связь';

    protected function buildData(FeedbackForm $model)
    {
        $attributes = $model->attributes;

        unset($attributes['captcha']);
        unset($attributes['accept']);
        $attributes['insurance'] = InsuranceType::getFullPath($attributes['insurance']);

        return $attributes;
    }

    public function send($model)
    {
        $data = $this->buildData($model);

        $message = Yii::$app->mailer->compose($this->view, ['data' => $data])
            ->setTo($data['email'])
            ->setFrom(Yii::$app->params['mailer.senderFrom'])
            ->setSubject($this->subject);

        return $message->send();
    }
}