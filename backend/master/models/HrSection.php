<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_section".
 *
 * @property integer $section_id
 * @property string $smartgroup_code
 * @property integer $department_id
 * @property string $section_name
 * @property integer $section_tanda
 */
class HrSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_section';
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
            [['smartgroup_code', 'department_id', 'section_name', 'section_tanda'], 'required'],
            [['department_id', 'section_tanda'], 'integer'],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['section_name'], 'string', 'max' => 200],
        ];
    }

      public function getCompanyTbl()
    {
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
                    ->via('departementTbl');                      
    }

    public function getDepartementTbl(){
        return $this->hasOne(HrDepartment::className(), ['department_id' => 'department_id']);
    }

     public function getNameCompany(){
         return $this->companyTbl->smartgroup_name ?? 'none';
    }

     public function getNameDepartement(){
         return $this->departementTbl->department_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'section_id' => 'Section ID',
            'smartgroup_code' => 'Smartgroup Code',
            'department_id' => 'Department ID',
            'section_name' => 'Section Name',
            'section_tanda' => 'Section Tanda',
        ];
    }
}
