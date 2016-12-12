<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mysay_level".
 *
 * @property integer $id
 * @property string $name
 */
class MysayLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mysay_level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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

    public static function mySayLevel(){
        $levels=MysayLevel::find()->asArray()->all();
        $arr=[];
        foreach ($levels as $k=>$v){
            $arr[$v['id']]=$v['name'];
        }
        return $arr;
    }

}
