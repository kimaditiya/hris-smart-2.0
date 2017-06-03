<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_jobpangkat".
 *
 * @property string $category_code
 * @property string $pangkat_code
 * @property string $pangkat_name
 * @property integer $pangkat_tanda
 */
class HrJobpangkat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_jobpangkat';
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
            [['category_code', 'pangkat_code', 'pangkat_name'], 'required'],
            [['pangkat_tanda'], 'integer'],
            [['category_code'], 'string', 'max' => 2],
            [['pangkat_code'], 'string', 'max' => 10],
            [['pangkat_name'], 'string', 'max' => 50],
        ];
    }

    public function getJobcategoryTbl()
    {
        return $this->hasOne(HrJobcategory::className(), ['category_code' => 'category_code']);
    }

     public function getCompanyTbl()
    {
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
            ->via('jobcategoryTbl');
    }

    public function getNameCompany(){
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    public function getNameCategory(){
        return $this->jobcategoryTbl->category_name ?? 'none';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_code' => 'Category Code',
            'pangkat_code' => 'Pangkat Code',
            'pangkat_name' => 'Pangkat Name',
            'pangkat_tanda' => 'Pangkat Tanda',
        ];
    }
}
