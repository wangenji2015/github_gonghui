<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id'], 'required'],
            [['parent_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'name' => '级别名称',
            'parent_id' => '上级级别',
        ];
    }
    public static function getAllLevels($parent_id){
        $levels = static::find()->select('id,name')->where(['parent_id'=>$parent_id])->asArray()->all();
        $levels_arr=array();
        foreach ($levels as $k=>$v){
            $levels_arr[$v['id']]=$v['name'];
        }
        return $levels_arr ? $levels_arr : static::getCurrentLevel(Yii::$app->user->identity->level_id);
    }
    public static function getUnders($parent_id){
        $levels = static::find()->select('id,name')->where(['parent_id'=>$parent_id])->asArray()->all();
        $levels_arr=array();
        foreach ($levels as $k=>$v){
            $levels_arr[$v['id']]=$v['name'];
        }
        return $levels_arr;
    }
    public static function getCurrentLevel($level_id){
        $levels_arr=array();
        $levels=static::find()->select("id,name")->where(['id'=>$level_id])->asArray()->one();
        $levels_arr[$levels['id']]=$levels['name'];
        return $levels_arr;
    }

    /**
     * 获取一级下属级别节点
     */
    public static function getUnderLevel($level_id){
//        $childs_arr=[];
//        $childs = static::find()->where(['parent_id'=>$level_id])->asArray()->all();
//        foreach ($childs as $k => $v){
//            $childs_arr[$v['id']]=$v['name'];
//        }
//        return $childs_arr;
        return static::find()->where(['parent_id'=>$level_id])->asArray()->all();
    }

    /**
     * 获取所有下属节点
     */
    public static function getAllUnderLevel($level_id){
        static $childs=array();
        $one_under_levels=static::getUnderLevel($level_id);
        $childs[]=$one_under_levels;
        foreach ($one_under_levels as $k => $v){
            $s_under_levels=static::getUnderLevel($v['id']);
            if($s_under_levels){
                static::getAllUnderLevel($v['id']);
            }
        }
        return $childs;
    }

    public static function getLevelsArr($childs){
        $ids=[];
        foreach ($childs as $k => $v){
            foreach ($v as $kk =>$vv){
                $ids[]=intval($vv['id']);
            }
        }
        return $ids;
    }

    public static function getBaseId($level_id){
        return static::findOne(['id'=>$level_id])->id;
    }
}
