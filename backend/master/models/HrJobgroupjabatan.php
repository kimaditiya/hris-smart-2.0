<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_jobgroupjabatan".
 *
 * @property string $category_code
 * @property integer $groupjabatan_code
 * @property string $groupjabatan_name
 * @property integer $groupjabatan_tanda
 */
class HrJobgroupjabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_jobgroupjabatan';
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
            [['category_code', 'groupjabatan_name'], 'required'],
            [['groupjabatan_tanda'], 'integer'],
            [['category_code'], 'string', 'max' => 2],
            [['groupjabatan_name'], 'string', 'max' => 150],
        ];
    }


     public function getCategoryTbl()
    { 
        return $this->hasOne(HrJobcategory::className(), ['category_code' => 'category_code']);
           
    }


    public function getCompanyTbl(){
        return $this->hasOne(Hrgroup::className(), ['smartgroup_code' => 'smartgroup_code'])
             ->via('categoryTbl');
    }

    public function getNameCompany(){
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    public function getNameCategory(){
        return $this->categoryTbl->category_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_code' => 'Category Code',
            'groupjabatan_code' => 'Groupjabatan Code',
            'groupjabatan_name' => 'Groupjabatan Name',
            'groupjabatan_tanda' => 'Groupjabatan Tanda',
        ];
    }
}
