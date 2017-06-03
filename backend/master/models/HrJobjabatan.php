<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_jobjabatan".
 *
 * @property string $category_code
 * @property integer $groupjabatan_code
 * @property integer $jabatan_code
 * @property string $jabatan_name
 * @property integer $jabatan_tanda
 */
class HrJobjabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_jobjabatan';
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
            [['category_code', 'groupjabatan_code', 'jabatan_name', 'jabatan_tanda'], 'required'],
            [['groupjabatan_code', 'jabatan_tanda'], 'integer'],
            [['category_code'], 'string', 'max' => 2],
            [['jabatan_name'], 'string', 'max' => 150],
        ];
    }


    public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
         ->via('groupjabatanTbl');             
    }

    public function getJobcategoryTbl(){
        return $this->hasOne(HrJobcategory::className(), ['category_code' => 'category_code'])
         ->via('groupjabatanTbl');           
    }

    public function getGroupjabatanTbl(){
        return $this->hasOne(HrJobgroupjabatan::className(), ['groupjabatan_code' => 'groupjabatan_code']);            
    }

    public function getNameCompany(){
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    public function getNameCategory(){
        return $this->jobcategoryTbl->category_name ?? 'none';
    }

    public function getNamegroupjabatan(){
        return $this->groupjabatanTbl->groupjabatan_name ?? 'none';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_code' => 'Category Code',
            'groupjabatan_code' => 'Groupjabatan Code',
            'jabatan_code' => 'Jabatan Code',
            'jabatan_name' => 'Jabatan Name',
            'jabatan_tanda' => 'Jabatan Tanda',
        ];
    }
}
