<?php

namespace frontend\models\forms;

use frontend\models\staticLists\InsuranceType;
use yii\base\Model;
use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use yii\captcha\Captcha;

/**
 * Class FeedbackForm
 * @package frontend\models\forms
 *
 * @property string $surname [фамилия]
 * @property string $name [имя]
 * @property string $patronymic [отчество]
 * @property string $email [электронная почта]
 * @property string $phone [телефон]
 * @property integer $insurance [вид страхования]
 * @property string $message [сообщение]
 * @property Captcha $captcha [каптча]
 * @property boolean $accept [подтверждение отправки данных]
 */
class FeedbackForm extends Model
{
    const SCENARIO_CREATE = 'create';

    public $surname;
    public $name;
    public $patronymic;
    public $email;
    public $phone;
    public $insurance;
    public $message;
    public $captcha;
    public $accept;


    public function scenarios ()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [
            'surname', 'name', 'patronymic', 'email', 'phone', 'insurance', 'message', /*'captcha',*/ 'accept'
        ];

        return $scenarios;
    }

    public function rules ()
    {
        return [
            'surnameRequired' => ['surname', 'required'],
            'surnameTrim' => ['surname', 'trim'],

            'nameRequired' => ['name', 'required'],
            'nameTrim' => ['name', 'trim'],

            'patronymicRequired' => ['patronymic', 'required'],
            'patronymicTrim' => ['patronymic', 'trim'],

            'emailRequired' => ['email', 'required'],
            'emailEmail' => ['email', 'email'],

            'phoneRequired' => ['phone', 'required'],
            'phoneMatch' => ['phone', 'match', 'pattern' => '/^(\+7)\((\d{3})\)(\d{3})-(\d{2})-(\d{2})/', 'message' => 'Необходимо ввести корректный телефонный номер'],

            'insuranceRequired' => ['insurance', 'required'],
            'insuranceIn' => ['insurance', 'in', 'range' => InsuranceType::getIds()],

            'messageRequired' => ['message', 'required'],
            'messageString' => ['message', 'string', 'min' => 1, 'max' => 1000],
            'messageTrim' => ['message', 'trim'],

            'captchaRequired' => ['captcha', ReCaptchaValidator2::class, 'uncheckedMessage' => 'Нужно подтвердить, что вы не робот'],

            'acceptBoolean' => ['accept', 'boolean'],
            'acceptCompare' => ['accept', 'compare', 'compareValue' => 1, 'message' => 'Подтвердите обработку персональных данных']
        ];
    }

    public function attributeLabels ()
    {
        return [
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'patronymic' => 'Отчество',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'insurance' => 'Вид страхования',
            'message' => 'Сообщение',
            'accept' => 'Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных'
        ];
    }
}
