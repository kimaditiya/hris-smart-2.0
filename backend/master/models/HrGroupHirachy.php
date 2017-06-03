<?php

namespace backend\master\models;
 
use Yii;
 
class HrGroupHirachy extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
 

    public static function tableName()
    {
        return 'group_hriracy';
    }

     /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_hrsmart');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['group_code', 'safe'];
        return $rules;
    }


}