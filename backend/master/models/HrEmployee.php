<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_employee".
 *
 * @property integer $employee_id
 * @property string $employee_nik
 * @property string $employee_nikhris
 * @property string $employee_identifikasi
 * @property string $employee_name
 * @property string $smartgroup_code
 * @property integer $employee_gender
 * @property string $employee_birthplace
 * @property string $employee_birthdate
 * @property string $employee_age
 * @property integer $employee_maritalstatus
 * @property string $employee_marrieddate
 * @property integer $employee_familystatus
 * @property integer $ptkp_id
 * @property string $employee_race
 * @property integer $employee_religion
 * @property string $employee_nationality
 * @property string $employee_emailpersonal
 * @property string $employee_emailoffice
 * @property string $employee_kodetelepon
 * @property string $employee_telepon
 * @property string $employee_mobile1
 * @property string $employee_mobile2
 * @property string $employee_joindate
 * @property integer $employee_jobstatus
 * @property string $employee_permanentdate
 * @property integer $employee_contractduration
 * @property string $employee_contractexpired
 * @property integer $employee_contracttype
 * @property string $employee_resigndate
 * @property string $employee_resignnote
 * @property string $employee_notactivedate
 * @property string $employee_foto
 * @property string $employee_fotoresize
 * @property integer $employee_height
 * @property integer $employee_weight
 * @property string $employee_tahun
 * @property integer $employee_status
 */
class HrEmployee extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'employee_nik', 'employee_nikhris', 'employee_identifikasi', 'employee_name', 'smartgroup_code', 'employee_gender', 'employee_birthplace', 'employee_birthdate', 'employee_age', 'employee_maritalstatus', 'employee_marrieddate', 'employee_familystatus', 'ptkp_id', 'employee_race', 'employee_religion', 'employee_nationality', 'employee_emailpersonal', 'employee_emailoffice', 'employee_kodetelepon', 'employee_telepon', 'employee_mobile1', 'employee_mobile2', 'employee_joindate', 'employee_jobstatus', 'employee_permanentdate', 'employee_contractduration', 'employee_contractexpired', 'employee_contracttype', 'employee_resigndate', 'employee_resignnote', 'employee_notactivedate', 'employee_foto', 'employee_fotoresize', 'employee_height', 'employee_weight', 'employee_tahun', 'employee_status'], 'required'],
            [['employee_id', 'employee_gender', 'employee_maritalstatus', 'employee_familystatus', 'ptkp_id', 'employee_religion', 'employee_jobstatus', 'employee_contractduration', 'employee_contracttype', 'employee_height', 'employee_weight', 'employee_status'], 'integer'],
            [['employee_birthdate', 'employee_marrieddate', 'employee_joindate', 'employee_permanentdate', 'employee_contractexpired', 'employee_resigndate', 'employee_notactivedate'], 'safe'],
            [['employee_resignnote'], 'string'],
            [['employee_nik'], 'string', 'max' => 8],
            [['employee_nikhris', 'employee_identifikasi'], 'string', 'max' => 10],
            [['employee_name', 'employee_nationality', 'employee_emailpersonal', 'employee_foto'], 'string', 'max' => 100],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['employee_birthplace'], 'string', 'max' => 200],
            [['employee_age'], 'string', 'max' => 3],
            [['employee_race', 'employee_emailoffice'], 'string', 'max' => 150],
            [['employee_kodetelepon'], 'string', 'max' => 5],
            [['employee_telepon', 'employee_mobile1', 'employee_mobile2'], 'string', 'max' => 15],
            [['employee_fotoresize'], 'string', 'max' => 255],
            [['employee_tahun'], 'string', 'max' => 4],
        ];
    }

    public function getCompanyTbl(){
        return $this->hasOne(HrGroup::className(), ['smartgroup_code' => 'smartgroup_code']);            
    }

     public function getEducationTbl(){
        return $this->hasOne(HrEmployeeeducation::className(), ['employee_identifikasi' => 'employee_identifikasi']);            
    }

    public function getNameEducation(){
        return $this->educationTbl->education_level ?? 'none';
    }

    public function getPlaceBrith(){
        return $this->employee_birthplace != '' ? $this->employee_birthplace : 'none';
    }

     public function getNameCompany()
    {
        return $this->companyTbl->smartgroup_name ?? 'none';
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'employee_nik' => 'Employee Nik',
            'employee_nikhris' => 'Employee Nikhris',
            'employee_identifikasi' => 'Employee Identifikasi',
            'employee_name' => 'Employee Name',
            'smartgroup_code' => 'Smartgroup Code',
            'employee_gender' => 'Employee Gender',
            'employee_birthplace' => 'Employee Birthplace',
            'employee_birthdate' => 'Employee Birthdate',
            'employee_age' => 'Employee Age',
            'employee_maritalstatus' => 'Employee Maritalstatus',
            'employee_marrieddate' => 'Employee Marrieddate',
            'employee_familystatus' => 'Employee Familystatus',
            'ptkp_id' => 'Ptkp ID',
            'employee_race' => 'Employee Race',
            'employee_religion' => 'Employee Religion',
            'employee_nationality' => 'Employee Nationality',
            'employee_emailpersonal' => 'Employee Emailpersonal',
            'employee_emailoffice' => 'Employee Emailoffice',
            'employee_kodetelepon' => 'Employee Kodetelepon',
            'employee_telepon' => 'Employee Telepon',
            'employee_mobile1' => 'Employee Mobile1',
            'employee_mobile2' => 'Employee Mobile2',
            'employee_joindate' => 'Employee Joindate',
            'employee_jobstatus' => 'Employee Jobstatus',
            'employee_permanentdate' => 'Employee Permanentdate',
            'employee_contractduration' => 'Employee Contractduration',
            'employee_contractexpired' => 'Employee Contractexpired',
            'employee_contracttype' => 'Employee Contracttype',
            'employee_resigndate' => 'Employee Resigndate',
            'employee_resignnote' => 'Employee Resignnote',
            'employee_notactivedate' => 'Employee Notactivedate',
            'employee_foto' => 'Employee Foto',
            'employee_fotoresize' => 'Employee Fotoresize',
            'employee_height' => 'Employee Height',
            'employee_weight' => 'Employee Weight',
            'employee_tahun' => 'Employee Tahun',
            'employee_status' => 'Employee Status',
        ];
    }
}
