<?php

namespace backend\recruitment\models;

use Yii;

/**
 * This is the model class for table "prf".
 *
 * @property string $noprf
 * @property string $tgl_request
 * @property string $reason_request
 * @property string $posisi
 * @property integer $jumlah_pegawai
 * @property string $tipe_pegawai
 * @property string $efektif_date
 * @property double $salary_start
 * @property integer $reason_penerimaan
 * @property double $salary_end
 */
class Prf extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prf';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noprf'], 'required'],
            [['tgl_request', 'efektif_date'], 'safe'],
            [['jumlah_pegawai', 'reason_penerimaan'], 'integer'],
            [['salary_start', 'salary_end'], 'number'],
            [['noprf', 'posisi', 'tipe_pegawai'], 'string', 'max' => 225],
            [['reason_request'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'noprf' => 'Noprf',
            'tgl_request' => 'Tgl Request',
            'reason_request' => 'Tambahkan diluar MPP',
            'posisi' => 'Posisi',
            'jumlah_pegawai' => 'Jumlah Pegawai',
            'tipe_pegawai' => 'Tipe Pegawai',
            'efektif_date' => 'Efektif Date',
            'salary_start' => 'Salary Start',
            'reason_penerimaan' => 'Reason Penerimaan',
            'salary_end' => 'Salary End',
        ];
    }
}
