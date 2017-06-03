<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrHomebase,HrHomebaseSearch};
use backend\master\models\HrGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * HrHomebaseController implements the CRUD actions for HrHomebase model.
 */
class HrHomebaseController extends Controller
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
     * Lists all HrHomebase models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $searchModel = new HrHomebaseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_company'=>self::aryCompany(),
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
        * list array export
    */
    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameCompany',
            'homebase_code',
            'homebase_name',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrHomebase model.
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
     * Creates a new HrHomebase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrHomebase();

        if ($model->load(Yii::$app->request->post())) {
            $model->homebase_tanda = 1;
            $model->smartgroup_code = Yii::$app->user->identity->smartgroup_code;
            $model->save();
            return $this->redirect(['index', 'id' => $model->homebase_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'kode_homebase'=>Yii::$app->ambilkode->KodeHomebase()
            ]);
        }
    }

    /**
     * Updates an existing HrHomebase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

             $model->save();
            return $this->redirect(['index', 'id' => $model->homebase_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'valStt'=>self::aryStatus(),
            ]);
        }
    }

    /**
     * Deletes an existing HrHomebase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->homebase_tanda = 3;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrHomebase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrHomebase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrHomebase::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
