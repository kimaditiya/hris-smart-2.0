<?php

namespace backend\sistem\controllers;

use Yii;
use backend\master\models\HrEmployee;
use common\models\UserBackend;
use yii\helpers\ArrayHelper;
use backend\sistem\models\{HrEmployeelog,HrEmployeelogSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * HrEmployeelogController implements the CRUD actions for HrEmployeelog model.
 */
class HrEmployeelogController extends Controller
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
     * Lists all HrEmployeelog models.
     * @return mixed
     */
    public function actionIndex() : string
    {

        $paramCari=Yii::$app->getRequest()->getQueryParam('id');

         if($paramCari != ''){
            $cari=['id'=>$paramCari];
            $url = Url::toRoute(['/sistem/hr-employeelog/view','id'=>$paramCari]);
            $js='$("#modaluser-view").modal("show")
              .find("#modalContentuserview").html("<i class=\"fa fa-2x fa-spinner fa-spin\"></i>")
              .load("'.$url.'")';
              
            $this->getView()->registerJs($js);
          }

        $searchModel = new HrEmployeelogSearch();
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
          ['STATUS' => 2, 'STT_NM' => 'Modified'],
        ];
        return $valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
    }

    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameEmploye',
            'employee_nik',
            'employee_pass',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrEmployeelog model.
     * @param integer $id
     * @return mixed
     */
    public function actionView(int $id) : string
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
            'data_employee'=>self::ary_employee()
        ]);
    }


    /**
        *get array hr_employee
    **/
    public function ary_employee() : array
    {
       $cari_log = (new \yii\db\Query())
                    ->select(['employee_identifikasi'])
                    ->from(HrEmployeelog::tableName())
                    ->where(['<','log_tanda',3])
                    ->all();

        if($cari_log){
            foreach ($cari_log as $key => $value) {
                    $id[] = $value['employee_identifikasi'];
                }
        }else{
            $id = '';
        }
        
        $cari_employee = HrEmployee::find()->where(['employee_status'=>1])
                                            ->andwhere(['not in','employee_identifikasi',$id])
                                            ->all();
        $fullvaluenik_identifkasi = ArrayHelper::map($cari_employee, function ($cari_employee, $defaultValue) {
            return $cari_employee->employee_nik . '-' . $cari_employee->employee_identifikasi;
        },'employee_name');

        return $fullvaluenik_identifkasi;
    }

    /**
        *get json hr_employee
    **/
    public function actionEmployeeAviliable($q = null, $id = null) : string {
      $out = ['results' => ['id' => '', 'text' => '']];
      if (!is_null($q)) {
         $cari_log = (new \yii\db\Query())
                    ->select(['employee_identifikasi'])
                    ->from(HrEmployeelog::tableName())
                    ->where(['<','log_tanda',3])
                    ->all();

        if($cari_log){
            foreach ($cari_log as $key => $value) {
                    $id[] = $value['employee_identifikasi'];
                }
        }else{
            $id = '';
        }

          $query =(new \yii\db\Query());
          $query->select(["CONCAT(employee_nik, '-', employee_identifikasi) AS id", 'employee_name AS text'])
              ->from(HrEmployee::tableName())
              ->where(['like', 'employee_name', $q])
              ->andwhere(['employee_status'=>1])
              ->andwhere(['not in','employee_identifikasi',$id])
              ->limit(20);

          $command = $query->createCommand();
          $data = $command->queryAll();
          $out['results'] = array_values($data);
      }

      return Json::encode($out);
  }


    /**
     * Creates a new HrEmployeelog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrEmployeelog();

        if ($model->load(Yii::$app->request->post())) {
            $split_valemploye = explode('-',$model->employee_identifikasi);
            $model->employee_nik = $split_valemploye[0];
            $model->employee_identifikasi = $split_valemploye[1];
            $model->smartgroup_code = '01';
            $model->employee_passori = UserBackend::setPassword($model->employee_pass);
            $model->log_tanda = 1;
            $model->save();
            return $this->redirect(['index', 'id' => $model->log_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_employee' =>self::ary_employee()
            ]);
        }
    }

    /**
     * Updates an existing HrEmployeelog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->employee_passori = UserBackend::setPassword($model->employee_pass);
            $model->log_tanda = 2;
            $model->save();
            return $this->redirect(['view', 'id' => $model->log_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'data_employee' =>self::ary_employee()
            ]);
        }
    }

    /**
     * Deletes an existing HrEmployeelog model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);
        $model->log_tanda = 3;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the HrEmployeelog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrEmployeelog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrEmployeelog::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
