<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mysay_address".
 *
 * @property integer $id
 * @property string $name
 */
class MysayAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mysay_address';
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

    public static function allAddress(){
        $address=MysayAddress::find()->asArray()->all();
        $arr=[];
        foreach ($address as $k=>$v){
            $arr[$v['id']]=$v['name'];
        }
        return $arr;
    }
}
