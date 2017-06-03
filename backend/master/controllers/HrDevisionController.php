<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrDevision,HrDevisionSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\master\models\HrGroup;
use backend\master\models\HrDirektorat;
use yii\helpers\ArrayHelper;

/**
 * HrDevisionController implements the CRUD actions for HrDevision model.
 */
class HrDevisionController extends Controller
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
     * Lists all HrDevision models.
     * @return mixed
     */
    public function actionIndex() : string 
    {
        $searchModel = new HrDevisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_company'=>self::aryCompany(),
            'grid_export'=>self::ary_export(),
            'data_direktorat'=>self::aryDirektorat(),
            'valStt'=>self::aryStatus()
        ]);
    }


     /*
        *list array company group
    */
    public function aryCompany() : array {
        $find_company = HrGroup::find()->all();
        return $data_company = ArrayHelper::map($find_company, 'smartgroup_code', 'smartgroup_name');
    }

     /*
        * list array export
    */
    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameCompany',
            'nameDivisi',
            'devision_name',
        ];
        return $gridColumns;
    }

    #list array status
    public function aryStatus() : array {
        $aryStt= [
            ['STATUS' => 1, 'STT_NM' => 'Active'],
            ['STATUS' => 2, 'STT_NM' => 'Modified'],
            ['STATUS' => 3, 'STT_NM' => 'InActive'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    #list array direktorat
    public function aryDirektorat() : array {
        $find_direktorat = HrDirektorat::find()->where(['<>','direktorat_tanda',3])->all();
        return $aryDirektorat = ArrayHelper::map($find_direktorat, 'direktorat_id', 'direktorat_name','nameBranch');
    }


    /**
     * Displays a single HrDevision model.
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
     * Creates a new HrDevision model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrDevision();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->devision_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_direktorat'=>self::aryDirektorat()
            ]);
        }
    }

    /**
     * Updates an existing HrDevision model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->devision_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrDevision model.
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
     * Finds the HrDevision model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrDevision the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = HrDevision::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
