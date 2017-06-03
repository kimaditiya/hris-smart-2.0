<?php

namespace backend\sistem\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

class MenuController extends Controller
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
    	*list menu
   	**/ 
    public function actionIndex() : string
    {
	   return $this->render('index');
    }

}