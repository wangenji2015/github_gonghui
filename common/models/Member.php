<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property string $pin_id
 * @property string $mobile
 * @property integer $level_id
 * @property string $work_danwei
 * @property integer $station
 * @property integer $area_id
 * @property integer $is_pass
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'pin_id', 'mobile', 'level_id', 'work_danwei', 'station', 'area_id'], 'required'],
            [['gender', 'level_id', 'station', 'area_id','is_pass'], 'integer'],
            [['name', 'pin_id', 'mobile', 'work_danwei'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'name' => '姓名',
            'gender' => '性别',
            'pin_id' => '身份证号',
            'mobile' => '电话',
            'level_id' => '级别所属',
            'work_danwei' => '工作单位',
            'station' => '岗位或工种',
            'area_id' => '单位所属区域',
            'is_pass' => '是否通过',
        ];
    }
    private static $allGenders=[
        1=>"男",
        2=>'女',
    ];
    public static function getAllGenders(){
        return static::$allGenders;
    }
    private static $passArr=[
        0=>'未通过',
        1=>'已通过'
    ];
    public static function getPassArr(){
        return static::$passArr;
    }
    public function getArea(){
        return $this->hasOne(Level::className(),['id'=>'area_id']);
    }
    public function getLevel(){
        return $this->hasOne(Level::className(),['id'=>'level_id']);
    }
    public function getGenderLabel(){
        return static::$allGenders[$this->gender];
    }
    public function afterSave($insert, $changedAttributes)
    {
        if(!$this->isNewRecord){
            $levelMember=new LevelMember();
            $level_id=Yii::$app->user->identity->level_id;
            $do_info=$levelMember::find()->andWhere(['member_id'=>$this->id])
                ->andWhere(['level_id'=>$level_id])
                ->one();
            if(!$do_info){
                $levelMember->member_id=$this->id;
                $levelMember->level_id=$level_id;
                $levelMember->save(false);
            }
        }
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
    public function getCurrentArea(){
        $area = Level::find()->where(['id'=>$this->area_id])->one();
        $arr[$area->id]=$area->name;
        return $arr;
    }



}
