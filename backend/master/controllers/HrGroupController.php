<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrGroup,HrGroupSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/**
 * HrGroupController implements the CRUD actions for HrGroup model.
 */
class HrGroupController extends Controller
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
     * Lists all HrGroup models.
     * @return mixed
     */
    public function actionIndex() : string
    {

        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

         if($paramCari != ''){
            $cari=['id'=>$paramCari];
            $url = Url::toRoute(['/master/hr-group/view','id'=>$paramCari]);
            $js='$("#modal-hrgroup-view-after").modal("show")
              .find("#modalContentgroupviewafter").html("<i class=\"fa fa-2x fa-spinner fa-spin\"></i>")
              .load("'.$url.'")';
              
            $this->getView()->registerJs($js);
          }

        $searchModel = new HrGroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'valStt'=>self::aryStatus(),
            'grid_export'=>self::ary_export(),
        ]);
    }

       #list array status
    public function aryStatus() : array {
        $aryStt= [
          ['STATUS' => 1, 'STT_NM' => 'Active'],
          ['STATUS' => 3, 'STT_NM' => 'Non Aktif'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'smartgroup_code',
            'smartgroup_name',
            'smartgroup_url',
        ];
        return $gridColumns;
    }


    public function actionHirarchyGroup(){
         return $this->render('index_hirachy');
    }

    /**
     * Displays a single HrGroup model.
     * @param string $id
     * @return mixed
     */
    public function actionView(string $id) : string
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new HrGroup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() 
    {
        $model = new HrGroup();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['index', 'id' => $model->smartgroup_code]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'kd_group'=>Yii::$app->ambilkode->Kodegroup_company()
            ]);
        }
    }

    /**
     * Updates an existing HrGroup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate(string $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['index', 'id' => $model->smartgroup_code]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'valStt'=>self::aryStatus(),
            ]);
        }
    }

    /**
     * Deletes an existing HrGroup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete(string $id)
    {
        $model = $this->findModel($id);
        $model->smartgroup_tanda = 3;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrGroup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HrGroup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrGroup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
