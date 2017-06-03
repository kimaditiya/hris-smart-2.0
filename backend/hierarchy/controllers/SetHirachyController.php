<?php

namespace backend\hierarchy\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\master\models\HrGroupHirachy;
use backend\hierarchy\models\{HriracySetmember,HriracySetmemberSearch};
use yii\helpers\Url;


class SetHirachyController extends Controller
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
        *getMemberRecrusive
        *@param array $children
        *@author wawan <aditiyakurniawan30@gmail.com>
        *@return array
    */

     private static function getMemberRecrusive(array $children) : array
    {
        $result = [];
        $category_r = [];
        foreach($children as $i => $child) {
            if($child['active'] != 0){
                $category_r = [
                    'title' => $child['name'],
                    'key'=>$child['id'],
                    'folder' => true,
                ];      
            }
            $result[$i] = $category_r;
             $new_children = $child->children(1,2,3)->All();

                if($new_children) {
                    $result[$i]['children'] = static::getMemberRecrusive($new_children); // new children

                }

            }
           

        return $result_items = $result;

    }



    /**
        *getMember
        *@author wawan <aditiyakurniawan30@gmail.com>
        *@since 1.2.0
        *@return array
    **/
    public static function getMember() : array
    {
        $roots = HrGroupHirachy::find()->roots()->all(); // get roots
        $result = [];
        $tree = []; 
        foreach ($roots as $n => $item) {
            if($item['active'] != 0){
                    $result = [
                    'title' => $item['name'],
                    'folder' => true,
                    'key'=>$item['id'],
                ];
            }
            $tree[$n] = $result;
            $children = $item->children(1)->all();
            
            if($children){
                $tree[$n]['children'] = static::getMemberRecrusive($children);
            }

        }

        return $tree;
        
    }

    /**
     * Creates a new HrBranch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new HriracySetmember();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->branch_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Lists all Hirachy.
     * @return mixed
     */
    public function actionIndex() : string
    {
    	return $this->render('index', [
        ]);
    }

    public function actionSettingMember() : string 
    {
       return $this->render('setting_member', [
            'data_tree'=>self::getMember(),
        ]); 
    }


    /**
     * Lists all Member.
     * @return string
     */
    public function actionViewMember(int $id) : string {
        $searchModel = new HriracySetmemberSearch(['kd_hirachy'=>$id]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->renderAjax('list_setmember', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'kd_source'=>$id
        ]);
    }


}