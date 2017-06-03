<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_harilibur".
 *
 * @property integer $harilibur_id
 * @property string $harilibur_tanggalawal
 * @property string $harilibur_tanggalakhir
 * @property string $harilibur_hariawal
 * @property string $harilibur_hariakhir
 * @property string $harilibur_keterangan
 * @property integer $harilibur_tanda
 */
class HrHarilibur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_harilibur';
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
            [['harilibur_tanggalawal', 'harilibur_tanggalakhir', 'harilibur_hariawal', 'harilibur_hariakhir', 'harilibur_keterangan'], 'required'],
            [['harilibur_tanggalawal', 'harilibur_tanggalakhir'], 'safe'],
            [['harilibur_keterangan'], 'string'],
            [['harilibur_tanda'], 'integer'],
            [['harilibur_hariawal', 'harilibur_hariakhir'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'harilibur_id' => 'Harilibur ID',
            'harilibur_tanggalawal' => 'Harilibur Tanggalawal',
            'harilibur_tanggalakhir' => 'Harilibur Tanggalakhir',
            'harilibur_hariawal' => 'Harilibur Hariawal',
            'harilibur_hariakhir' => 'Harilibur Hariakhir',
            'harilibur_keterangan' => 'Harilibur Keterangan',
            'harilibur_tanda' => 'Harilibur Tanda',
        ];
    }
}
