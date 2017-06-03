<?php

namespace common\components;
use Yii;
use yii\base\Component;
use backend\master\models\HrEmployee;

/**
    * component Ambil Profile Employee
    * usage Yii::$app->ambilprofile->GetProfile()  
    * @author aditiya kurniawan <aditiyakurniawan30@gmail.com>
    * @since 1.0
**/

/**
    php 7 style
    
**/
define('statusAmbilProfileComponent', [
      '1',  // status aktif
   ]);

class AmbilProfileComponent  extends Component {

    public static function GetProfile()  {
        if(!Yii::$app->user->isGuest){
            $cari_employee = HrEmployee::find()->where(['employee_identifikasi'=>Yii::$app->user->identity->employee_identifikasi,'employee_status'=>statusAmbilProfileComponent[0]])->one();
            $cari_employee = $cari_employee ?? 'none';

            return $cari_employee;
        }
    }
   
}