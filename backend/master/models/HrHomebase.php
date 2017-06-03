<?php

namespace backend\master\models;

use Yii;
use backend\master\models\HrGroup;

/**
 * This is the model class for table "hr_homebase".
 *
 * @property integer $homebase_id
 * @property string $smartgroup_code
 * @property string $homebase_code
 * @property string $homebase_name
 * @property integer $homebase_tanda
 */
class HrHomebase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_homebase';
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
        return [
            [['smartgroup_code', 'homebase_code', 'homebase_name'], 'required'],
            [['homebase_tanda'], 'integer'],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['homebase_code'], 'string', 'max' => 4],
            [['homebase_name'], 'string', 'max' => 100],
        ];
    }


     public function getGroupTbl()
    {
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);
    }

     public function getNameCompany()
    {
        return $this->groupTbl->smartgroup_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'homebase_id' => 'Homebase ID',
            'smartgroup_code' => 'Smartgroup Code',
            'homebase_code' => 'Homebase Code',
            'homebase_name' => 'Homebase Name',
            'homebase_tanda' => 'Homebase Tanda',
        ];
    }
}
