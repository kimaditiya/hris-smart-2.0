<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_department".
 *
 * @property integer $department_id
 * @property integer $direktorat_id
 * @property integer $devision_id
 * @property string $department_name
 * @property integer $department_tanda
 */
class HrDepartment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_department';
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
            [['direktorat_id', 'devision_id', 'department_name'], 'required'],
            [['direktorat_id', 'devision_id', 'department_tanda'], 'integer'],
            [['department_name'], 'string', 'max' => 200],
            [['department_tanda'], 'default', 'value' =>1],
        ];
    }

     public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
                    ->via('devisionTbl');               
    }

      public function getDevisionTbl()
    { 
        return $this->hasOne(HrDevision::className(), ['devision_id' => 'devision_id']);
    }

    public function getDirektoratTbl(){
        return $this->hasOne(HrDirektorat::className(), ['direktorat_id' => 'direktorat_id'])
                ->via('devisionTbl');
    }

    public function getNamedirektorat(){
         return $this->direktoratTbl->direktorat_name ?? 'none';
    }

    public function getNameCompany(){
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    public function getNameDivisi(){
         return $this->devisionTbl->devision_name ?? 'none';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => 'Department ID',
            'direktorat_id' => 'Direktorat ID',
            'devision_id' => 'Devision ID',
            'department_name' => 'Department Name',
            'department_tanda' => 'Department Tanda',
        ];
    }
}
