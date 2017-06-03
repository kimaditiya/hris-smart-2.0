<?php

namespace common\components;
use Yii;
use yii\base\Component;

/**
    *component konversi format date,time and datetime
    * usage date Yii::$app->ambilconversi->convert($value)  
    * usage datetime Yii::$app->ambilconversi->convert($value,datetime)
    * usage time Yii::$app->ambilconversi->convert($value,time)
    *@author aditiya kurniawan <aditiyakurniawan30@gmail.com>
    *@since 1.0
**/

/**
    php 7 style
    
**/
define('setupdatefmt', [
      'php:Y-m-d',  // DATE_FORMAT
      'php:Y-m-d H:i:s', //DATETIME_FORMAT
      'php:H:i:s' //TIME_FORMAT
   ]);


class SetupDateComponent  extends Component {

    public static function convert($dateStr, $type='date', $format = null) {
        if ($type === 'datetime') {
              $fmt = $format ?? setupdatefmt[1];
        }
        elseif ($type === 'time') {
              $fmt = $format ?? setupdatefmt[2];
        }
        else {
              $fmt = $format ?? setupdatefmt[0];
        }
        return Yii::$app->formatter->asDate($dateStr, $fmt);
    }
}