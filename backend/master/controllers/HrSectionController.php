<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrSection,HrSectionSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\master\models\HrGroup;
use backend\master\models\HrDepartment;

/**
 * HrSectionController implements the CRUD actions for HrSection model.
 */
class HrSectionController extends Controller
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
     * Lists all HrSection models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $searchModel = new HrSectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'data_company'=>self::aryCompany(),
            'data_department'=>self::aryDepartment(),
            'valStt'=>self::aryStatus(),
            'grid_export'=>self::ary_export()
        ]);
    }

     #list array department
     public function aryDepartment() : array {
        $find_department = HrDepartment::find()->where(['<>','department_tanda',3])->all();
        return $aryDepartment = ArrayHelper::map($find_department, 'department_id', 'department_name','namedirektorat');
    }

     /*
        *list array company group
    */
    public function aryCompany() : array {
        $find_company = HrGroup::find()->all();
        return $data_company = ArrayHelper::map($find_company, 'smartgroup_code', 'smartgroup_name');
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


     /*
        * list array export
    */
    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameCompany',
            'nameDepartment',
            'section_name',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrSection model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) : string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HrSection model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrSection();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->section_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_department'=>self::aryDepartment()
            ]);
        }
    }

    /**
     * Updates an existing HrSection model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->section_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrSection model.
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
     * Finds the HrSection model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrSection the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = HrSection::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
