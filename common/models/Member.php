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
            [['gender', 'level_id', 'station', 'area_id'], 'integer'],
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
        ];
    }
    private static $allGenders=[
        1=>"男",
        2=>'女',
    ];
    public static function getAllGenders(){
        return static::$allGenders;
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
}
