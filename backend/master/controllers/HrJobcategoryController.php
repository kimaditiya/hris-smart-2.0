<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrJobcategory,HrJobcategorySearch};
use backend\master\models\HrGroup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * HrJobcategoryController implements the CRUD actions for HrJobcategory model.
 */
class HrJobcategoryController extends Controller
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
     * Lists all HrJobcategory models.
     * @return mixed
     */
    public function actionIndex() : string 
    {
        $searchModel = new HrJobcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'valStt'=>self::aryStatus(),
            'data_company'=>self::aryCompany(),
            'grid_export'=>self::ary_export(),
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
            'nameCompany',
            'category_name',
            'category_code',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrJobcategory model.
     * @param string $id
     * @return mixed
     */
    public function actionView(string $id) : string 
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HrJobcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrJobcategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->category_code]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HrJobcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate(string $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->category_code]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrJobcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete(string $id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrJobcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HrJobcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrJobcategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
