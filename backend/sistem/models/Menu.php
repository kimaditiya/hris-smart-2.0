<?php

namespace backend\sistem\models;
 
use Yii;
 
class Menu extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
 

    public static function tableName()
    {
        return 'menu';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['icon_menu_utama','route'],'safe'];
        return $rules;
    }

}