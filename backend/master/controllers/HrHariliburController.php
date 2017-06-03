<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\HrHarilibur;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * HrHariliburController implements the CRUD actions for HrHarilibur model.
 */
class HrHariliburController extends Controller
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
     * Lists all HrHarilibur models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        return $this->render('index');
    }


    /**
     * Creates a new HrHarilibur model.
     * If creation is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionCreate(string $tgl1,string $tgl2)
    {
        $model = new HrHarilibur();

        if ($model->load(Yii::$app->request->post())) {
            $model->harilibur_tanggalawal = $tgl1;
            $model->harilibur_tanggalakhir = $tgl2;
            $day_awal = date('D', strtotime($model->harilibur_tanggalawal));
            $day_akhir =  date('D', strtotime($model->harilibur_tanggalakhir));
            $model->harilibur_hariawal =  $day_awal;
            $model->harilibur_hariakhir = $day_akhir;
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
    public function actionCalenderLibur($start=NULL,$end=NULL,$_=NULL) : string {
        $aryEvent = (new \yii\db\Query())
            ->select(['harilibur_id as id', 'harilibur_tanggalawal as start','harilibur_tanggalakhir as end','harilibur_keterangan as title','color'])
            ->from('db_hrsmart.'.HrHarilibur::tableName())
            ->where(['<>','harilibur_tanda',2])
            ->all();
        return Json::encode($aryEvent);
    }

}
