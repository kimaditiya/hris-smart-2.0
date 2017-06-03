<?php

namespace backend\recruitment\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\master\models\HrJobjabatan;
use backend\recruitment\models\Prf;


/**
 * PrfController implements the CRUD actions for HrBranch model.
 */
class PrfController extends Controller
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
     * Lists all HrBranch models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $model = new Prf();

        return $this->render('form', [
           	'model'=>$model,
           	'data_pegawai'=>self::aryStatus(),
           	'data_posisi'=>self::aryJabatan()
        ]);
    }


      #list array status
    public function aryStatus() : array {
        $aryStt= [
            ['STATUS' => 1, 'STT_NM' => 'Karyawan Tetap'],
            ['STATUS' => 2, 'STT_NM' => 'Karyawan Kontrak'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

      #list array status
    public function aryJabatan() : array {
       	$find_jabatan = HrJobjabatan::find()->all();
        return $valStt = ArrayHelper::map($find_jabatan, 'jabatan_code', 'jabatan_name');
    }


}