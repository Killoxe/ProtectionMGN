<?php

namespace frontend\models\forms;

use himiklab\yii2\recaptcha\ReCaptchaValidator2;
use yii\base\Model;
use yii\captcha\Captcha;
use frontend\models\validators\CalculateOsagoPeopleValidator;

/**
 * Class CalculateOsagoForm
 * @package frontend\models\forms
 *
 * @property string $surname [фамилия]
 * @property string $name [имя]
 * @property string $patronymic [отчество]
 * @property string $email [электронная почта]
 * @property string $phone [телефонный номер]
 * @property array $people [люди]
 * @property integer $date_end_insurance_policy [дата окончания стархового полиса]
 * @property integer $horse_power [лошадиных сил]
 * @property string $registration [прописка]
 * @property Captcha $captcha [каптча]
 * @property boolean $accept [подтверждение отправки данных]
 */
class CalculateOsagoForm extends Model
{
    const SCENARIO_CREATE = 'create';

    public $surname;
    public $name;
    public $patronymic;
    public $email;
    public $phone;
    public $people = [];
    public $peopleValid;
    public $date_end_insurance_policy;
    public $horse_power;
    public $registration;
    public $captcha;
    public $accept;

    public function scenarios ()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [
            'surname', 'name', 'patronymic', 'people', 'peopleValid', 'date_end_insurance_policy', 'horse_power',
            'registration', 'email', 'phone', 'captcha', 'accept',
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

            'peopleValidation' => ['people', CalculateOsagoPeopleValidator::class],

            'date_end_insurance_policySafe' => ['date_end_insurance_policy', 'safe'],

            'horse_powerRequired' => ['horse_power', 'required'],
            'horse_powerBoolean' => ['horse_power', 'integer'],

            'registrationRequired' => ['registration', 'required'],
            'registrationString' => ['registration', 'integer'],

            'emailRequired' => ['email', 'required'],
            'emailEmail' => ['email', 'email'],

            'phoneRequired' => ['phone', 'required'],
            'phoneMatch' => ['phone', 'match', 'pattern' => '/^(\+7)\((\d{3})\)(\d{3})-(\d{2})-(\d{2})/', 'message' => 'Необходимо ввести корректный телефонный номер'],

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
            'date_birth' => 'Дата рождения',
            'driver_license_number' => 'Номер водительского удостоверения',
            'driver_license_series' => 'Серия водительского удостоверения',
            'date_begin_experience' => 'Дата начала стажа',
            'date_end_insurance_policy' => 'Дата окончания страхового полиса ОСАГО (если есть)',
            'horse_power' => 'Сколько лошадиных сил в автомобиле',
            'registration' => 'Прописка',
            'accept' => 'Нажимая кнопку «Отправить», я даю свое согласие на обработку моих персональных данных, в соответствии с Федеральным законом от 27.07.2006 года №152-ФЗ «О персональных данных», на условиях и для целей, определенных в Согласии на обработку персональных данных'
        ];
    }
}