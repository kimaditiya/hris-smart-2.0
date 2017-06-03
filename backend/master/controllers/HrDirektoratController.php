<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrDirektorat,HrDirektoratSearch};
use backend\master\models\HrBranch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * HrDirektoratController implements the CRUD actions for HrDirektorat model.
 */
class HrDirektoratController extends Controller
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
     * Lists all HrDirektorat models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

         if($paramCari != ''){
            $cari=['id'=>$paramCari];
            $url = Url::toRoute(['/master/hr-direktorat/view','id'=>$paramCari]);
            $js='$("#modal-direktorat-view-after").modal("show")
              .find("#modalContentdirektoratAfter").html("<i class=\"fa fa-2x fa-spinner fa-spin\"></i>")
              .load("'.$url.'")';
              
            $this->getView()->registerJs($js);
          }

        $searchModel = new HrDirektoratSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'grid_export'=>self::ary_export(),
            'valStt'=>self::aryStatus(),
            'data_branch'=>self::aryBranch(),
        ]);
    }

    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameBranch',
            'direktorat_name',
        ];
        return $gridColumns;
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


     #list array Branch
    public function aryBranch() : array {
        $find_branch = HrBranch::find()->with('regionTbl')->all();
        $ary_branch = ArrayHelper::map($find_branch, 'branch_code', 'branch_name','nameRegion');
        return $ary_branch;
    }

    /**
     * Displays a single HrDirektorat model.
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
     * Creates a new HrDirektorat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrDirektorat();

        if ($model->load(Yii::$app->request->post())) {
            $model->log_id = Yii::$app->user->identity->log_id;
            $model->direktorat_tanda = 1;
            $model->save();
            return $this->redirect(['index', 'id' => $model->direktorat_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_branch'=>self::aryBranch(),
            ]);
        }
    }

    /**
     * Updates an existing HrDirektorat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['index', 'id' => $model->direktorat_id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
                'data_branch'=>self::aryBranch(),
                'valStt'=>self::aryStatus(),
            ]);
        }
    }

    /**
     * Deletes an existing HrDirektorat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id) 
    {
        $model = $this->findModel($id);

        $model->direktorat_tanda = 3;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrDirektorat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrDirektorat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrDirektorat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
