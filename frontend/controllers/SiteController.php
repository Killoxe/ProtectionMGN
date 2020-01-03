<?php
namespace frontend\controllers;

use frontend\models\forms\CalculateOsagoForm;
use frontend\models\forms\FeedbackForm;
use frontend\services\mail\FeedbackSendingMailServiceFactory;
use frontend\services\mail\CalculateOsagoSendingMailServiceFactory;
use Yii;
use yii\base\Module;
use yii\web\Controller;
use frontend\components\AjaxRequestModelValidatorFactory;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /** @var FeedbackSendingMailServiceFactory  */
    protected $feedbackSendingMailServiceFactory;

    /** @var CalculateOsagoSendingMailServiceFactory  */
    protected $calculateOsagoSendingMailServiceFactory;

    public function __construct(
        $id, Module $module,
        FeedbackSendingMailServiceFactory $feedbackSendingMailServiceFactory,
        CalculateOsagoSendingMailServiceFactory $calculateOsagoSendingMailServiceFactory,
        array $config = []
    ) {
        parent::__construct($id, $module, $config);
        $this->feedbackSendingMailServiceFactory = $feedbackSendingMailServiceFactory;
        $this->calculateOsagoSendingMailServiceFactory = $calculateOsagoSendingMailServiceFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction'
            ]
        ];
    }

    public function actionIndex()
    {
        $feedbackFormModel = new FeedbackForm();
        $feedbackFormModel->scenario = FeedbackForm::SCENARIO_CREATE;
        $feedbackFormModel->name = 'ser';
        $feedbackFormModel->surname = 'ter';
        $feedbackFormModel->patronymic = 'dmit';
        $feedbackFormModel->email = 'boi@next.door';
        $feedbackFormModel->phone = '+7(800)555-35-35';
        $feedbackFormModel->insurance = 0;
        $feedbackFormModel->message = 'кхъ';
        $feedbackFormModel->accept = true;

        $calculateOsagoFormModel = new CalculateOsagoForm();
        $calculateOsagoFormModel->scenario = CalculateOsagoForm::SCENARIO_CREATE;
        $calculateOsagoFormModel->name = 'ser';
        $calculateOsagoFormModel->surname = 'ter';
        $calculateOsagoFormModel->patronymic = 'dmit';
        $calculateOsagoFormModel->horse_power = 3;
        $calculateOsagoFormModel->registration = 0;
        $calculateOsagoFormModel->email = 'boi@next.door';
        $calculateOsagoFormModel->phone = '+7(800)555-35-35';
        $calculateOsagoFormModel->accept = true;

        $request = Yii::$app->request;
        if($request->getIsAjax()) {

            //TODO: почему-то не приходит алерт от осаго формы

            if ($request->post('CalculateOsagoForm')) {
                Yii::$app->response->format = Response::FORMAT_JSON;

                if ($calculateOsagoFormModel->load($request->post()) && $calculateOsagoFormModel->validate()) {
                    \yii\helpers\VarDumper::dump($calculateOsagoFormModel->attributes,20,true);
                    /*if ($this->calculateOsagoSendingMailServiceFactory->get()->send($calculateOsagoFormModel)) {
                        $calculateOsagoFormModel = new CalculateOsagoForm();
                        $calculateOsagoFormModel->scenario = CalculateOsagoForm::SCENARIO_CREATE;
                        Yii::$app->session->setFlash('success', 'отправили');
                    } else {
                        Yii::$app->session->setFlash('danger', 'ошибка отправки почты');
                    }*/
                } else {
                    Yii::$app->session->setFlash('danger', 'ошибка валидации');
                }

            }

            if ($request->post('FeedbackForm')) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                if ($feedbackFormModel->load($request->post()) && $feedbackFormModel->validate()) {
                    if ($this->feedbackSendingMailServiceFactory->get()->send($feedbackFormModel)) {
                        $feedbackFormModel = new FeedbackForm();
                        $feedbackFormModel->scenario = FeedbackForm::SCENARIO_CREATE;
                        Yii::$app->session->setFlash('success', 'отправили');
                    } else {
                        Yii::$app->session->setFlash('danger', 'ошибка отправки почты');
                    }
                } else {
                    Yii::$app->session->setFlash('danger', 'ошибка валидации');
                }
                //\yii\helpers\VarDumper::dump($request->post(), 20, true);
            }
        }

        return $this->render('index', [
            'feedbackFormModel' => $feedbackFormModel,
            'calculateOsagoFormModel' => $calculateOsagoFormModel
        ]);
    }
}
