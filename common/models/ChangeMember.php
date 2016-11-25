<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "change_member".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property string $pin_id
 * @property string $mobile
 * @property string $origin_gh
 * @property string $work_danwei
 * @property integer $area_id
 * @property integer $create_time
 * @property integer $is_pass
 */
class ChangeMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'change_member';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'gender', 'pin_id', 'mobile', 'origin_gh', 'work_danwei', 'level_id', 'area_id', 'create_time', 'is_pass'], 'required'],
            [['gender', 'area_id', 'create_time', 'is_pass','level_id'], 'integer'],
            [['name', 'pin_id', 'mobile', 'origin_gh', 'work_danwei'], 'string', 'max' => 255],
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
            'mobile' => '手机号',
            'origin_gh' => '原所在工会',
            'work_danwei' => '现所在单位',
            'level_id'=>'级别所属',
            'area_id' => '现单位所在区县',
            'create_time' => '申请时间',
            'is_pass' => '是否准许转会',
        ];
    }

    private static $genders=[
        1=>'男',
        2=>'女'
    ];
    private static $is_pass_arr=[
        0=>'不准许转会',
        1=>'准许转会'
    ];
    public static function allGenders(){
        return static::$genders;
    }

    public static function getIsPass(){
        return static::$is_pass_arr;
    }

    public function getCurrentArea(){
        $area = Level::find()->where(['id'=>$this->area_id])->one();
        $arr[$area->id]=$area->name;
        return $arr;
    }
    public function afterSave($insert, $changedAttributes)
    {
        if(!$insert){
            $change_info=LevelChange::find()->andWhere(['level_id'=>Yii::$app->user->identity->level_id])
                ->andWhere(['change_id'=>$this->id])
                ->one();
            if(!$change_info){
                $levelChange= new LevelChange();
                $levelChange->level_id=Yii::$app->user->identity->level_id;
                $levelChange->change_id=$this->id;
                $levelChange->save(false);
            }
        }
        parent::afterSave($insert, $changedAttributes);
    }

    public function getGender(){
        return static::$genders[$this->gender];
    }

    public function getLevel(){
        return $this->hasOne(Level::className(),['id'=>'level_id']);
    }
}
