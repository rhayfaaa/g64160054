<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Invoices;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $invoices = Invoices::find()->all();
        return $this->render('home', ['invoices' => $invoices]);
    }


    public function actionCreate() {
        $invoice = new Invoices();
        $formData = Yii::$app->request->post();
        if($invoice->load($formData)){
            if($invoice->save()) {
                Yii::$app->getSession()->setFlash('message', 'Invoice Added Succesfully.');
                return $this->redirect(['index']);
            }
            else {
                Yii::$app->getSession()->setFlash('message', 'There was an Error. Please Try Again.');
            }
        }
        return $this->render('create', ['invoice' => $invoice]);
    }

    public function actionView($id) {
        $invoice = Invoices::findONE($id);
        return $this->render('view', ['invoice' => $invoice]);
    }

    public function actionUpdate($id) {
        $invoice = Invoices::findONE($id);
        if($invoice->load(Yii::$app->request->post()) && $invoice->save()){
            Yii::$app->getSession()->setFlash('message', 'Update Successfull.');
            return $this->redirect(['index', 'id' => $invoice->no_resi]);
        }
        else {
            return $this->render('update', ['invoice' => $invoice]);
        }
    }

    public function actionDelete($id) {
        $invoice = Invoices::findOne($id)->delete();
        if($invoice){
            Yii::$app->getSession()->setFlash('message', 'Delete Successfull.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
