<?php

namespace backend\master\controllers;

use Yii;
use backend\master\models\{HrDepartment,HrDepartmentSearch};
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\master\models\HrDirektorat;
use backend\master\models\HrDevision;
use backend\master\models\HrGroup;
use yii\web\Response;
use yii\helpers\Json;

/**
 * HrDepartmentController implements the CRUD actions for HrDepartment model.
 */
class HrDepartmentController extends Controller
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
     * Lists all HrDepartment models.
     * @return mixed
     */
    public function actionIndex() : string
    {
        $searchModel = new HrDepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'grid_export'=>self::ary_export(),
            'valStt'=>self::aryStatus(),
            'data_direktorat'=> self::aryDirektorat(),
            'data_division'=>self::aryDivision(),
            'data_company'=>self::aryCompany()
        ]);
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

     #list array direktorat
    public function aryDirektorat() : array {
        $find_direktorat = HrDirektorat::find()->where(['<>','direktorat_tanda',3])->all();
        return $aryDirektorat = ArrayHelper::map($find_direktorat, 'direktorat_id', 'direktorat_name','nameBranch');
    }

    #list array division
     public function aryDivision() : array {
        $find_division = HrDevision::find()->where(['<>','devision_tanda',3])->all();
        return $aryDivision = ArrayHelper::map($find_division, 'devision_id', 'devision_name','nameDirektorat');
    }

    /*
        * list array export
    */
    public function ary_export() : array {
        $gridColumns = [
            ['class' => 'yii\grid\SerialColumn'],
            'nameCompany',
            'nameDirektorat',
            'department_name',
        ];
        return $gridColumns;
    }

    /**
     * Displays a single HrDepartment model.
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
     * Creates a new HrDepartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HrDepartment();

        if ($model->load(Yii::$app->request->post())) {

            $model->save();
            return $this->redirect(['index', 'id' => $model->department_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'data_direktorat'=> self::aryDirektorat(),
                'data_division'=>self::aryDivision()
            ]);
        }
    }


 /**
     * Depdrop division
     * @author wawan
     * @since 1.1.0
     * @return array
     */
   public function actionListDivision() {
    $out = [];
    if (isset($_POST['depdrop_parents'])) {
        $parents = $_POST['depdrop_parents'];
        if ($parents != null) {
            $id = $parents[0];
            $model = HrDevision::find()->asArray()->where(['and',['direktorat_id'=>$id],['<>','devision_tanda',3]])
                                                    ->all();
            //$out = self::getSubCatList($cat_id);
            // the getSubCatList function will query the database based on the
            // cat_id and return an array like below:
            // [
            //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
            //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
            // ]
      
            foreach ($model as $key => $value) {
                   $out[] = ['id'=>$value['devision_id'],'name'=> $value['devision_name']];
               }
            
               echo json_encode(['output'=>$out, 'selected'=>'']);
               return;
           }
       }
       echo Json::encode(['output'=>'', 'selected'=>'']);
   }

    /**
     * Updates an existing HrDepartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

             $model->save();
            return $this->redirect(['index', 'id' => $model->department_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing HrDepartment model.
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
     * Finds the HrDepartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return HrDepartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HrDepartment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
