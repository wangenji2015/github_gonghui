<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "work_type".
 *
 * @property integer $id
 * @property string $name
 */
class WorkType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_type';
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
    public static function getWorkTypes(){
        $work=static::find()->asArray()->all();
        $work_arr=[];
        foreach ($work as $k => $v){
            $work_arr[$v['id']]=$v['name'];
        }
        return $work_arr;
    }
}
