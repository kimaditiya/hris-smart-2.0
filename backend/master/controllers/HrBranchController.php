<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrBranch,HrBranchSearch};
use backend\master\models\HrGroup;
use backend\master\models\HrRegion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * HrBranchController implements the CRUD actions for HrBranch model.
 */
class HrBranchController extends Controller
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
        $searchModel = new HrBranchSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_company'=>self::aryCompany(),
            'data_region'=>self::aryRegion(),
            'valStt'=>self::aryStatus(),
            'grid_export'=>self::ary_export()
        ]);
    }

     #list array status
    public function aryStatus() : array {
        $aryStt= [
            ['STATUS' => 1, 'STT_NM' => 'Active'],
            ['STATUS' => 2, 'STT_NM' => 'Modified'],
            ['STATUS' => 3, 'STT_NM' => 'InAktif'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    /*
        *list array company group
    */
    public function aryCompany() : array {
        $find_company = HrGroup::find()->all();

        return $data_company = ArrayHelper::map($find_company, 'smartgroup_code', 'smartgroup_name');
    }

     /*
        *list array region 
    */
    public function aryRegion() : array {
        $find_region = HrRegion::find()->with('groupTbl')->all();

        return $data_region = ArrayHelper::map($find_region, 'region_code', 'region_name','companyName');
    }


    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'branch_name',
            'nameCompany',
            'nameRegion',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrBranch model.
     * @param integer $id
     * @return mixed
     */
    public function actionView(int $id) : string
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HrBranch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrBranch();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_region'=>self::aryRegion()
            ]);
        }
    }


     public function actionValidBranch() : array
    {
      # code...
        $model = new HrBranch();
        $model->scenario = 'createupdate';
      if(Yii::$app->request->isAjax && $model->load($_POST))
      {
        Yii::$app->response->format = 'json';
        return ActiveForm::validate($model);
      }
    }

    /**
     * Updates an existing HrBranch model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrBranch model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->branch_tanda = 3;

        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrBranch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrBranch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrBranch::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
