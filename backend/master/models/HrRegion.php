<?php

namespace backend\master\models;

use Yii;
use backend\master\models\HrGroup;

/**
 * This is the model class for table "hr_region".
 *
 * @property string $region_name
 * @property integer $region_code
 * @property string $smartgroup_code
 * @property integer $region_tanda
 */
class HrRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_region';
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
            [['region_name', 'smartgroup_code'], 'required'],
            [['region_tanda'], 'integer'],
            [['region_name'], 'string', 'max' => 50],
            [['smartgroup_code'], 'string', 'max' => 4],
        ];
    }


     public function getGroupTbl()
    {
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);
    }

     public function getCompanyName()
    {
        return $this->groupTbl->smartgroup_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_name' => 'Region Name',
            'region_code' => 'Region Code',
            'smartgroup_code' => 'Smartgroup Code',
            'region_tanda' => 'Region Tanda',
        ];
    }
}
