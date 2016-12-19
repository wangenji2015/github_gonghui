<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "gh_depart".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property string $depart_key
 */
class GhDepart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gh_depart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'depart_key'], 'required'],
            [['parent_id'], 'integer'],
            [['name', 'depart_key'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'depart_key' => 'Depart Key',
        ];
    }
    public static function getDepartName(){
        $departs=GhDepart::find()->asArray()->all();
        $arr=[];
        foreach ($departs as $k=>$v){
            $arr[$v['id']]=$v['name'];
        }
        return $arr;
    }
    public function get_all_count($depart_id){
        set_time_limit(0);
        global $count;
        $base_count=GhUser::find()->select('id')->where(['depart_id'=>$depart_id])->count("id");
        $count+=$base_count;
        //查询下一级别的所有工会
        $gonghui=GhDepart::find()->select("id")->where(['parent_id'=>$depart_id]);
        if($gonghui){
            $next_gonghui=GhUser::find()->select(["depart_id"])->where(['parent_id'=>$depart_id])->groupBy("depart_id")->asArray()->all();
            foreach ($next_gonghui as $k=>$v){
                $this->get_all_count($v['depart_id']);
            }
        }
        return $count;
    }
    public function get_quxian_count($depart_id){
        $quxian_count=GhUser::find()->select("id")->where(['quxian_id'=>$depart_id])->count("id");
        return $quxian_count;
    }

}
