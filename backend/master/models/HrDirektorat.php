<?php

namespace backend\master\models;

use Yii;
use backend\master\models\HrBranch;

/**
 * This is the model class for table "hr_direktorat".
 *
 * @property integer $direktorat_id
 * @property string $branch_code
 * @property string $direktorat_name
 * @property integer $direktorat_tanda
 * @property integer $log_id
 *
 * @property HrDevision[] $hrDevisions
 */
class HrDirektorat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_direktorat';
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
            [['branch_code', 'direktorat_name'], 'required'],
            [['direktorat_tanda', 'log_id'], 'integer'],
            [['branch_code'], 'string', 'max' => 3],
            [['direktorat_name'], 'string', 'max' => 150],
        ];
    }


     public function getBranchTbl()
    {
        return $this->hasOne(HrBranch::className(), ['branch_code' => 'branch_code']);
    }

     public function getNameBranch()
    {
        return $this->branchTbl->branch_name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'direktorat_id' => 'Direktorat ID',
            'branch_code' => 'Branch Code',
            'direktorat_name' => 'Direktorat Name',
            'direktorat_tanda' => 'Direktorat Tanda',
            'log_id' => 'Log ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHrDevisions()
    {
        return $this->hasMany(HrDevision::className(), ['direktorat_id' => 'direktorat_id']);
    }
}
