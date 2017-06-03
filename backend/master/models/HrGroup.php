<?php

namespace backend\master\models;

use Yii;

/**
 * This is the model class for table "hr_group".
 *
 * @property string $smartgroup_code
 * @property string $smartgroup_name
 * @property string $smartgroup_shortname
 * @property string $smartgroup_url
 * @property integer $smartgroup_tanda
 */
class HrGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_group';
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
            [['smartgroup_code', 'smartgroup_name', 'smartgroup_shortname', 'smartgroup_url'], 'required'],
            [['smartgroup_tanda'], 'integer'],
            [['smartgroup_tanda'], 'default','value'=>1],
            [['smartgroup_code'], 'string', 'max' => 2],
            [['smartgroup_name'], 'string', 'max' => 100],
            [['smartgroup_shortname'], 'string', 'max' => 20],
            [['smartgroup_url'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'smartgroup_code' => 'Smartgroup Code',
            'smartgroup_name' => 'Smartgroup Name',
            'smartgroup_shortname' => 'Smartgroup Shortname',
            'smartgroup_url' => 'Smartgroup Url',
            'smartgroup_tanda' => 'Smartgroup Tanda',
        ];
    }
}
