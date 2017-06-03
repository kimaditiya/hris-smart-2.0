<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_devision".
 *
 * @property integer $devision_id
 * @property integer $direktorat_id
 * @property string $smartgroup_code
 * @property string $devision_name
 * @property integer $devision_tanda
 */
class HrDevision extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_devision';
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
            [['direktorat_id','devision_name'], 'required'],
            [['direktorat_id', 'devision_tanda'], 'integer'],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['devision_name'], 'string', 'max' => 200],
        ];
    }

    public function getDirektoratTbl(){
         return $this->hasOne(HrDirektorat::className(), ['direktorat_id' => 'direktorat_id']);
    }

     public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);
                    
    }

    public function getNameCompany(){
         return $this->companyTbl->smartgroup_name ?? 'none';
    }

     public function getNameDirektorat(){
         return $this->direktoratTbl->direktorat_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'devision_id' => 'Devision ID',
            'direktorat_id' => 'Direktorat ID',
            'smartgroup_code' => 'Smartgroup Code',
            'devision_name' => 'Devision Name',
            'devision_tanda' => 'Devision Tanda',
        ];
    }
}
