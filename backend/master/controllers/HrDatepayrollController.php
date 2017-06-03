<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\HrDatepayroll;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * HrDatepayrollController implements the CRUD actions for HrHarilibur model.
 */
class HrDatepayrollController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all HrDatepayroll models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        return $this->render('index');
    }


    /**
     * Creates a new HrDatepayroll model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate(string $tgl1,string $tgl2)
    {
        $model = new HrDatepayroll();

        if ($model->load(Yii::$app->request->post())) {
            $model->datepayroll_date = $tgl1;
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
        *@author aditiya kurniawan <aditiyakurniawan30@gmail.com>
        *@since 1.0.0 beta
        *json calender
    **/ 
    public function actionCalenderPayrol($start=NULL,$end=NULL,$_=NULL) : string {
        $aryEvent = (new \yii\db\Query())
            ->select(['datepayroll_id as id', 'datepayroll_date as start','datepayroll_date as end','keterangan as title'])
            ->from('db_hrsmart.'.HrDatepayroll::tableName())
            ->where(['<>','datepayroll_tanda',2])
            ->all();
        return Json::encode($aryEvent);
    }

}
