<?php

namespace backend\hierarchy\models;

use Yii;

/**
 * This is the model class for table "hriracy_setmember".
 *
 * @property string $id
 * @property string $root
 * @property string $kd_source
 * @property string $kd_ref
 */
class HriracySetmember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hriracy_setmember';
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
            [['root', 'kd_source'], 'integer'],
            [['kd_ref'], 'string', 'max' => 25],
        ];
    }


     public function getHirachyTbl()
    {
        return $this->hasOne(GroupHriracy::className(), ['id' => 'kd_source']);
                               
    }

    public function getNameHirachy(){
         return $this->hirachyTbl->name ?? 'none';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'root' => 'Root',
            'kd_source' => 'Kd Source',
            'kd_ref' => 'Kd Ref',
        ];
    }
}
