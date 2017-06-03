<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_jobgrade".
 *
 * @property string $pangkat_code
 * @property integer $grade_id
 * @property string $grade_value
 * @property string $smartgroup_code
 * @property integer $grade_tanda
 */
class HrJobgrade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
   
    public static function tableName()
    {
        return 'hr_jobgrade';
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
            [['pangkat_code', 'grade_value'], 'required'],
            [['grade_tanda'], 'integer'],
            [['pangkat_code'], 'string', 'max' => 10],
            [['grade_value'], 'string', 'max' => 20],
            [['smartgroup_code'], 'string', 'max' => 2],
        ];
    }

    public function getPangkatTbl(){
         return $this->hasOne(HrJobpangkat::className(), ['pangkat_code' => 'pangkat_code']);
    }

    public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
            ->via('pangkatTbl');
    }

     public function getNameCompany(){
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    public function getNamePangkat(){
        return $this->pangkatTbl->pangkat_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pangkat_code' => 'Pangkat Code',
            'grade_id' => 'Grade ID',
            'grade_value' => 'Grade Value',
            'smartgroup_code' => 'Smartgroup Code',
            'grade_tanda' => 'Grade Tanda',
        ];
    }
}
