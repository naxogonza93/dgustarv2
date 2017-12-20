<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "systemuser".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $userLevel
 */
class Systemuser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    const ROLE_ADMIN = 10;
    const ROLE_SUPERADMIN = 20;
    
    public static function tableName()
    {
        return 'systemuser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone_number', 'username', 'email', 'password', 'authKey'], 'required'],
            [['userLevel'], 'string'],
            [['first_name', 'last_name', 'username', 'password', 'authKey'], 'string', 'max' => 250],
            [['phone_number'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 500],
            [['username'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'userLevel' => 'User Level',
        ];
    }
     /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    
    public static function isUserSuperAdmin($username){
        
        if (static::findOne(['username' => $username, 'userLevel' => 'SuperAdmin'])){
 
             return true;
      } else {
 
             return false;
      }
    }
    
    public static function isUserAdmin($username){
      if (static::findOne(['username' => $username,  'userLevel' => 'Admin'])){
 
             return true;
      } else {
 
             return false;
      }
 
    }
}
