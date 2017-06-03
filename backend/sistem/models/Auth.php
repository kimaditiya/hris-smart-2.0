<?php

namespace backend\sistem\models;

use Yii;

/**
 * This is the model class for table "auth_item_child".
 *
 * @property string $parent
 * @property string $child
 * @property string $menu_id
 *
 * @property AuthItem $parent0
 */
class Auth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item_child';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'required'],
            [['menu_id'], 'integer'],
            [['parent', 'child'], 'string', 'max' => 64],
            [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => AuthItem::className(), 'targetAttribute' => ['parent' => 'name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'parent' => 'Parent',
            'child' => 'Child',
            'menu_id' => 'Menu ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(AuthItem::className(), ['name' => 'parent']);
    }
}
