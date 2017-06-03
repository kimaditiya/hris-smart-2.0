<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrJobjabatan,HrJobjabatanSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * HrJobjabatanController implements the CRUD actions for HrJobjabatan model.
 */
class HrJobjabatanController extends Controller
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
     * Lists all HrJobjabatan models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $searchModel = new HrJobjabatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'valStt'=>self::aryStatus(),
            'grid_export'=>self::ary_export()
        ]);
    }

      #list array status
    public function aryStatus() : array {
        $aryStt= [
          ['STATUS' => 1, 'STT_NM' => 'Active'],
          ['STATUS' => 3, 'STT_NM' => 'InAktif'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    /*
        * list array export
    */
    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameCompany',
            'nameCategory',
            'namegroupjabatan',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrJobjabatan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView(int $id) : string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HrJobjabatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrJobjabatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jabatan_code]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrJobjabatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->jabatan_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrJobjabatan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrJobjabatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrJobjabatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrJobjabatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
