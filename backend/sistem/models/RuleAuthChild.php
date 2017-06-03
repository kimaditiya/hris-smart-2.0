<?php

namespace backend\sistem\models;

use Yii;

/**
 * This is the model class for table "rule_auth_child".
 *
 * @property string $parent_rule
 * @property string $child_rule
 *
 * @property RuleAuth $parentRule
 */
class RuleAuthChild extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_auth_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_rule', 'child_rule'], 'required'],
            [['parent_rule'], 'integer'],
            [['child_rule'], 'string', 'max' => 225],
            [['parent_rule'], 'exist', 'skipOnError' => true, 'targetClass' => RuleAuth::className(), 'targetAttribute' => ['parent_rule' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent_rule' => 'Parent Rule',
            'child_rule' => 'Child Rule',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentRule()
    {
        return $this->hasOne(RuleAuth::className(), ['id' => 'parent_rule']);
    }
}
