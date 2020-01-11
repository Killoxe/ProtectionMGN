<?php
namespace frontend\controllers;

use frontend\models\forms\CalculateOsagoForm;
use frontend\models\forms\FeedbackForm;
use frontend\services\mail\FeedbackSendingMailServiceFactory;
use frontend\services\mail\CalculateOsagoSendingMailServiceFactory;
use Yii;
use yii\base\Module;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

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
        ];
    }

    public function actionIndex()
    {
        $feedbackFormModel = new FeedbackForm();
        $feedbackFormModel->scenario = FeedbackForm::SCENARIO_CREATE;

        $calculateOsagoFormModel = new CalculateOsagoForm();
        $calculateOsagoFormModel->scenario = CalculateOsagoForm::SCENARIO_CREATE;

        return $this->render('index', [
            'feedbackFormModel' => $feedbackFormModel,
            'calculateOsagoFormModel' => $calculateOsagoFormModel
        ]);
    }

    public function actionFeedbackForm()
    {
        $model = new FeedbackForm();
        $model->scenario = FeedbackForm::SCENARIO_CREATE;

        $request = Yii::$app->request;
        if ($request->getIsAjax() && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($this->feedbackSendingMailServiceFactory->get()->send($model)) {
                $model = new FeedbackForm();
                $model->scenario = FeedbackForm::SCENARIO_CREATE;
                Yii::$app->session->setFlash('success', 'Обращение успешно отправлено');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки обращения');
            }
        }

        return $this->render('_FeedbackForm', ['model' => $model]);
    }

    public function actionFeedbackFormValidation()
    {
        $request = Yii::$app->request;
        if ($request->getIsAjax()) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new FeedbackForm();
            $model->scenario = FeedbackForm::SCENARIO_CREATE;

            if ($model->load($request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }

    public function actionCalculateOsagoForm()
    {
        $model = new CalculateOsagoForm();
        $model->scenario = CalculateOsagoForm::SCENARIO_CREATE;

        $request = Yii::$app->request;
        if ($request->getIsAjax() && $model->load($request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            if ($this->calculateOsagoSendingMailServiceFactory->get()->send($model)) {
                $model = new CalculateOsagoForm();
                $model->scenario = CalculateOsagoForm::SCENARIO_CREATE;
                Yii::$app->session->setFlash('success', 'Заявка успешно отправлена');
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки заявки');
            }
        }

        return $this->render('_CalculateOsagoForm', ['model' => $model]);
    }

    public function actionCalculateOsagoFormValidation()
    {
        $request = Yii::$app->request;
        if ($request->getIsAjax()) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            $model = new CalculateOsagoForm();
            $model->scenario = CalculateOsagoForm::SCENARIO_CREATE;

            if ($model->load($request->post())) {
                return ActiveForm::validate($model);
            }
        }
    }
}
