<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_employeeeducation".
 *
 * @property integer $education_id
 * @property string $employee_identifikasi
 * @property integer $education_level
 * @property string $education_institution
 * @property string $education_majorin
 * @property string $education_city
 * @property string $education_startyear
 * @property string $education_endyear
 * @property integer $education_tanda
 */
class HrEmployeeeducation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employeeeducation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_identifikasi', 'education_level', 'education_institution', 'education_majorin', 'education_city', 'education_startyear', 'education_endyear', 'education_tanda'], 'required'],
            [['education_level', 'education_tanda'], 'integer'],
            [['employee_identifikasi'], 'string', 'max' => 8],
            [['education_institution', 'education_majorin'], 'string', 'max' => 200],
            [['education_city'], 'string', 'max' => 100],
            [['education_startyear', 'education_endyear'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'education_id' => 'Education ID',
            'employee_identifikasi' => 'Employee Identifikasi',
            'education_level' => 'Education Level',
            'education_institution' => 'Education Institution',
            'education_majorin' => 'Education Majorin',
            'education_city' => 'Education City',
            'education_startyear' => 'Education Startyear',
            'education_endyear' => 'Education Endyear',
            'education_tanda' => 'Education Tanda',
        ];
    }
}
