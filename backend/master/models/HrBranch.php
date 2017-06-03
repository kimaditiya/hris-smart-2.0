<?php

namespace backend\master\models;

use Yii;
use backend\master\models\HrGroup;
use backend\master\models\HrRegion;

/**
 * This is the model class for table "hr_branch".
 *
 * @property integer $branch_id
 * @property integer $region_code
 * @property string $branch_code
 * @property string $branch_name
 * @property string $smartgroup_code
 * @property integer $branch_tanda
 *
 * @property HrGroup $smartgroupCode
 */
class HrBranch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_branch';
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
            [['region_code', 'branch_code', 'branch_name'], 'required'],
            [['region_code', 'branch_tanda'], 'integer'],
            [['branch_code'], 'string', 'max' => 3],
            [['branch_name'], 'string', 'max' => 50],
            [['branch_tanda'], 'default', 'value' =>1],
            [['branch_code'], 'ValidBranch','on'=>'createupdate'],
            // [['smartgroup_code'], 'string', 'max' => 2],
            // [['smartgroup_code'], 'exist', 'skipOnError' => true, 'targetClass' => HrGroup::className(), 'targetAttribute' => ['smartgroup_code' => 'smartgroup_code']],
        ];
    }


    public function ValidBranch($attribute, $params){
        $check_exist = HrBranch::find()->where(['branch_code'=>$this->branch_code])->one();
        if($check_exist){
             $this->addError($attribute, 'Maaf kode branch dengan nomer ini sudah dipakai untuk cabang'.' '.$check_exist->branch_name);
        }
       
    }

     public function getRegionTbl()
    {
        return $this->hasOne(HrRegion::className(), ['region_code' => 'region_code']);
                               
    }

     public function getNameRegion()
    {
        return $this->regionTbl->region_name ?? 'none';
    }

    public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code'])
             ->via('regionTbl');
                    
    }

    public function getNameCompany(){
         return $this->companyTbl->smartgroup_name ?? 'none';
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'branch_id' => 'Branch ID',
            'region_code' => 'Region Code',
            'branch_code' => 'Branch Code',
            'branch_name' => 'Branch Name',
            'smartgroup_code' => 'Smartgroup Code',
            'branch_tanda' => 'Branch Tanda',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSmartgroupCode()
    {
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);
    }
}
