<?php

namespace backend\sistem\models;

use Yii;

/**
 * This is the model class for table "rule_assigment".
 *
 * @property string $rule_id
 * @property string $user_id
 * @property string $create_at
 *
 * @property RuleAuth $ruleAuth
 */
class RuleAssigment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_assigment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rule_id', 'user_id'], 'required'],
            [['rule_id', 'user_id'], 'integer'],
            [['create_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rule_id' => 'Rule ID',
            'user_id' => 'User ID',
            'create_at' => 'Create At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleAuth()
    {
        return $this->hasOne(RuleAuth::className(), ['id' => 'rule_id']);
    }
}
