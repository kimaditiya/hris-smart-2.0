<?php

namespace common\components;
use Yii;
use yii\base\Component;
use backend\master\models\HrGroup;
use backend\master\models\HrHomebase;
/**
    * component Ambil Kode
    * usage Yii::$app->ambilkode->Kodegroup_company();
    * @author aditiya kurniawan <aditiyakurniawan30@gmail.com>
    * @since 1.0.0
**/


class AmbilKodeComponent  extends Component {

    // kode group company
    public static function Kodegroup_company(){
        $cari_max_company = HrGroup::find()->max('smartgroup_code');
        if (count($cari_max_company)==0){
             $nkd=1;
          }else{
            $nkd=$cari_max_company+1;
          }

         $digit = str_pad($nkd,2,"0",STR_PAD_LEFT); //digit

         $kd_company = $digit;

         return $kd_company;
    }

    //kode homebase
    public static function KodeHomebase(){
        $cari_max_homebase = HrHomebase::find()->max('homebase_code');
        if (count($cari_max_homebase)==0){
             $nkd=1;
          }else{
            $get_kd = substr($cari_max_homebase,2);
            $nkd= $get_kd+1;
          }

         $kd_homebase = 'HB'.$nkd;

         return $kd_homebase;
    }

}