<?php

namespace backend\sistem\models;

use Yii;

/**
 * This is the model class for table "rule_auth".
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 *
 * @property RuleAssigment $id0
 * @property RuleAuthChild[] $ruleAuthChildren
 */
class RuleAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rule_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'description'], 'string', 'max' => 225],
            // [['id'], 'exist', 'skipOnError' => true, 'targetClass' => RuleAssigment::className(), 'targetAttribute' => ['id' => 'rule_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(RuleAssigment::className(), ['rule_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleAuthChildren()
    {
        return $this->hasMany(RuleAuthChild::className(), ['parent_rule' => 'id']);
    }
}
