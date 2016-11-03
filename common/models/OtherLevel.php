<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "other_level".
 *
 * @property integer $id
 * @property string $name
 */
class OtherLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'other_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 32],
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
        ];
    }
    public static function getOtherLevel(){
        $other_levels=static::find()->asArray()->all();
        $other_arr=[];
        foreach ($other_levels as $k=>$v){
            $other_arr[$v['id']]=$v['name'];
        }
        return $other_arr;
    }
}
