<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }


    // list array gender employee
    public function find_gender() : array {
        $dataContent_gender =[]; //init array

        $find_gender = 'select * from view_gender';
        $result_gender = Yii::$app->db->createCommand($find_gender)->queryAll(); // gender
        if($result_gender){
                foreach ($result_gender as $key => $value) {
                # code...
                $dataContent_gender[]=["label"=>$value['gender'],"value"=>$value['jumlah_gender']];
            }
        }
        return $dataContent_gender;
    }
 // list array martial
    public function find_martial() : array {
        $find_statuspernikahan = 'SELECT * from view_martial';
        $dataContent_martial =[]; // init array
        $result_martial = Yii::$app->db->createCommand($find_statuspernikahan)->queryAll(); // martial
        if($result_martial){
            foreach ($result_martial as $key => $value) {
                # code...
                $dataContent_martial[]=["label"=>$value['status_pernikahan'],"value"=>$value['jumlah_employee']];
            }

        }

        return $dataContent_martial;
    }

    public function find_education() : array {
        $find_education = 'select * from view_educationemployee';
        $dataContent_education =[]; // init array
        $result_education = Yii::$app->db->createCommand($find_education)->queryAll(); // education
        if($result_education){
            foreach ($result_education as $key => $value) {
                # code...
                $dataContent_education[]=["label"=>$value['status_education'],"value"=>$value['jumlah']];
            }

        }

        return $dataContent_education;
    }


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() : string
    {
        return $this->render('index',[
                'result_gender'=>self::find_gender(),
                'result_martial'=>self::find_martial(),
                'result_education'=>self::find_education()
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
