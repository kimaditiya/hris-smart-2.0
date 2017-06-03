<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\master\models\HrEmployee;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */

/**
    php 7 style

**/
define('status_userbackend', [
      '1', 
      '2',
      '3'
   ]);

class UserBackend extends ActiveRecord implements IdentityInterface
{
   
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hr_employeelog';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['log_tanda', 'default', 'value' => status_userbackend[0]],
            ['log_tanda', 'in', 'range' => [status_userbackend[0], status_userbackend[2],status_userbackend[1]]],
        ];
    }


    public function getEmployeeTbl()
    {
        return $this->hasOne(HrEmployee::className(), ['employee_identifikasi' => 'employee_identifikasi']);
    }



     public function getNameEmploye()
    {
        return $this->employeeTbl->employee_name != '' ? $this->employeeTbl->employee_name : 'none';
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {

        return static::find()->where(['log_id' => $id])
                            ->andWhere(['<>','log_tanda',status_userbackend[2]])
                            ->one();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by nik
     *
     * @param string $nik
     * @return static|null
     */
    public static function findByNik($nik)
    {
        return static::find()->where(['employee_nik' => $nik])
                            ->andWhere(['<>','log_tanda',status_userbackend[2]])
                            ->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
       
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
       
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
       
    }



    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        $pass = self::setPassword($this->employee_pass);

        return Yii::$app->security->validatePassword($password, $pass);
    }




      /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {

        return  Yii::$app->security->generatePasswordHash($password);

        
    }

  

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        // $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        // $this->password_reset_token = null;
    }
}
