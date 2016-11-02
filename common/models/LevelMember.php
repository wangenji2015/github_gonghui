<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "level_member".
 *
 * @property integer $id
 * @property integer $level_id
 * @property integer $member_id
 */
class LevelMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level_id', 'member_id'], 'required'],
            [['id', 'level_id', 'member_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level_id' => 'Level ID',
            'member_id' => 'Member ID',
        ];
    }

    public static function getIsdoId($level_id){
        $members = static::find()->where(['level_id'=>$level_id])->asArray()->all();
        $member_ids=[];
        foreach ($members as $k => $v){
            $member_ids[]=intval($v['member_id']);
        }
        return $member_ids;
    }
}
