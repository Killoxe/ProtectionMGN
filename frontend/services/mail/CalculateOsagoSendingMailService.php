<?php
namespace frontend\services\mail;

use frontend\models\forms\CalculateOsagoForm;
use Yii;
use yii\base\BaseObject;
use frontend\models\staticLists\HorsePower;
use frontend\models\staticLists\Registration;

/**
 * Class CalculateOsagoSendingMailService
 * @package frontend\services\mail
 */
class CalculateOsagoSendingMailService extends BaseObject
{
    public $view = 'calculate-osago-html';

    public $subject = 'Заявка на ОСАГО';

    protected function buildData(CalculateOsagoForm $model)
    {
        $attributes = $model->attributes;

        unset($attributes['people'][-1]);
        unset($attributes['peopleValid']);
        unset($attributes['captcha']);
        unset($attributes['accept']);

        $attributes['horse_power'] = HorsePower::getName($attributes['horse_power']);
        $attributes['registration'] = Registration::getName($attributes['registration']);

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