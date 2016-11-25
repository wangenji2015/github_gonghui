<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "level_change".
 *
 * @property integer $id
 * @property integer $level_id
 * @property integer $change_id
 */
class LevelChange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level_change';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'level_id', 'change_id'], 'required'],
            [['id', 'level_id', 'change_id'], 'integer'],
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
            'change_id' => 'Change ID',
        ];
    }
    public static function getIsDoIds($level_id){
        $changes=LevelChange::find()->where(['level_id'=>$level_id])->asArray()->all();
        $change_ids=[];
        foreach ($changes as $k=>$v){
            $change_ids[]=intval($v['change_id']);
        }
        return $change_ids;

    }
}
