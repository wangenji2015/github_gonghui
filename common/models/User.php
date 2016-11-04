<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $level_id
 * @property integer $lawyer_id
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public $role_info;
    public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
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
            [['username'], 'required'],
            [['level_id','lawyer_id','other_level','minder_id'],'validate_type','skipOnEmpty'=> false],
            ['username', 'unique'],
            [['role', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['level_id','integer'],
            ['lawyer_id','integer'],
            ['minder_id','integer'],
            ['role_info','required'],
            ['password','string']

        ];
    }
    public function validate_type($attribute,$params){
        if(empty($this->level_id) && empty($this->lawyer_id) && empty($this->other_level) && empty($this->minder_id)){
            $this->addError($attribute,"请选择关联律师或者级别或者关联心理专家");
            return false;
        }
        return true;
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'username' => '用户名',
            'auth_key' => '自动登录key',
            'password_hash' => '加密密码',
            'password_reset_token' => '重置密码token',
            'email' => '邮箱',
            'role' => '角色等级',
            'status' => '状态',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'level_id'=>'级别',
            'lawyer_id'=>'关联律师',
            'minder_id'=>'关联心理专家',
            'other_level'=>'其他职务',
            'role_info' => '赋予的角色',
        ];
    }
    public static function getAllLevels($parent_id){
        return Level::getAllLevels($parent_id);
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
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
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function createUser(){
        if (!$this->validate()) {
            return null;
        }

        // 实现数据入库操作
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;
        $user->level_id=$this->level_id;
        // 设置密码，密码肯定要加密，暂时我们还没有实现，看下面我们有实现的代码
        $user->setPassword($this->password_hash);

        // 生成 "remember me" 认证key
        $user->generateAuthKey();

        // save(false)的意思是：不调用UserBackend的rules再做校验并实现数据入库操作
        // 这里这个false如果不加，save底层会调用UserBackend的rules方法再对数据进行一次校验，因为我们上面已经调用Signup的rules校验过了，这里就没必要在用UserBackend的rules校验了
        return $user->save(false);
    }
    public function beforeSave($insert)
    {
        if (!$this->validate()) {
            return null;
        }
        $this->setPassword($this->password);
        $this->generateAuthKey();
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $role=Yii::$app->authManager->getRole($this->role_info);
            Yii::$app->authManager->assign($role,$this->id);
        }

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    public static function getAllRoles(){
            $role=Yii::$app->authManager->getRoles();
            $role_arr=[];
            foreach ($role as $k => $v){
                $role_arr[$k]=$v->name;
            }
            return $role_arr;
    }

}
