<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_jobcategory".
 *
 * @property string $category_code
 * @property string $category_name
 * @property string $smartgroup_code
 * @property integer $category_tanda
 */
class HrJobcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_jobcategory';
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
            [['category_code', 'category_name', 'smartgroup_code', 'category_tanda'], 'required'],
            [['category_tanda'], 'integer'],
            [['category_code', 'smartgroup_code'], 'string', 'max' => 2],
            [['category_name'], 'string', 'max' => 50],
        ];
    }

     public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);
                    
    }

    public function getNameCompany(){
         return $this->companyTbl->smartgroup_name != '' ? $this->companyTbl->smartgroup_name : 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_code' => 'Category Code',
            'category_name' => 'Category Name',
            'smartgroup_code' => 'Smartgroup Code',
            'category_tanda' => 'Category Tanda',
        ];
    }
}
