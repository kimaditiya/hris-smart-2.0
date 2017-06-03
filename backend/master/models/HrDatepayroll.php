<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_datepayroll".
 *
 * @property integer $datepayroll_id
 * @property string $datepayroll_date
 * @property string $datepayroll_hari
 * @property string $datepayroll_bulan
 * @property string $datepayroll_month
 * @property integer $datepayroll_status
 * @property integer $datepayroll_tanda
 */
class HrDatepayroll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_datepayroll';
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
            [['datepayroll_date','keterangan'], 'required'],
            [['datepayroll_date'], 'safe'],
            [['datepayroll_status', 'datepayroll_tanda'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'datepayroll_id' => 'Datepayroll ID',
            'datepayroll_date' => 'Datepayroll Date',
            'keterangan'=>'keterangan',
        ];
    }
}
