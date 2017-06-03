<?php

namespace backend\sistem\models;

use Yii;
use backend\master\models\HrEmployee;

/**
 * This is the model class for table "hr_employeelog".
 *
 * @property integer $log_id
 * @property string $employee_identifikasi
 * @property string $employee_nik
 * @property string $smartgroup_code
 * @property integer $smf
 * @property integer $rajamokas
 * @property integer $sma
 * @property integer $smabadi
 * @property integer $smauto
 * @property integer $bas
 * @property integer $ssm
 * @property string $employeelog_gradedari
 * @property string $employeelog_gradesampai
 * @property string $employee_pass
 * @property string $employee_passori
 * @property integer $log_status
 * @property integer $log_tanda
 */
class HrEmployeelog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employeelog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_identifikasi','employee_pass'], 'required'],
            [['smf', 'rajamokas', 'sma', 'smabadi', 'smauto', 'bas', 'ssm', 'log_status', 'log_tanda'], 'integer'],
            [['employee_identifikasi'], 'string'],
            [['employee_nik'], 'string', 'max' => 8],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['employeelog_gradedari', 'employeelog_gradesampai'], 'string', 'max' => 5],
            [['employee_pass'], 'string', 'max' => 50],
            [['employee_passori'], 'string', 'max' => 255],
        ];
    }

     public function getEmployeeTbl()
    {
        return $this->hasOne(HrEmployee::className(), ['employee_identifikasi' => 'employee_identifikasi']);
    }

     public function getNameEmploye()
    {
        return $this->employeeTbl->employee_name != '' ? $this->employeeTbl->employee_name : 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'log_id' => 'Log ID',
            'employee_identifikasi' => 'Employee Identifikasi',
            'employee_nik' => 'Employee Nik',
            'smartgroup_code' => 'Smartgroup Code',
            'smf' => 'Smf',
            'rajamokas' => 'Rajamokas',
            'sma' => 'Sma',
            'smabadi' => 'Smabadi',
            'smauto' => 'Smauto',
            'bas' => 'Bas',
            'ssm' => 'Ssm',
            'employeelog_gradedari' => 'Employeelog Gradedari',
            'employeelog_gradesampai' => 'Employeelog Gradesampai',
            'employee_pass' => 'Employee Pass',
            'employee_passori' => 'Employee Passori',
            'log_status' => 'Log Status',
            'log_tanda' => 'Log Tanda',
        ];
    }
}
