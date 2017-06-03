<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrRegion,HrRegionSearch};
use backend\master\models\HrGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * HrRegionController implements the CRUD actions for HrRegion model.
 */
class HrRegionController extends Controller
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
     * Lists all HrRegion models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $searchModel = new HrRegionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'grid_export'=>self::ary_export(),
            'valStt'=>self::aryStatus(),
            'data_company'=>self::aryCompany(),
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


    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'region_code',
            'region_name',
            'smartgroup_code',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrRegion model.
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
     * Creates a new HrRegion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrRegion();

        if ($model->load(Yii::$app->request->post())) {
            $model->smartgroup_code = Yii::$app->user->identity->smartgroup_code;
            $model->region_tanda = 1;
            $model->save();
            return $this->redirect(['index', 'id' => $model->region_code]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrRegion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

             $model->save();
            return $this->redirect(['index', 'id' => $model->region_code]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'valStt'=> self::aryStatus()
            ]);
        }
    }

    /**
     * Deletes an existing HrRegion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->region_tanda = 3;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrRegion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrRegion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = HrRegion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
