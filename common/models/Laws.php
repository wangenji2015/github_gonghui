<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "laws".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $create_at
 * @property integer $update_at
 * @property string $from
 * @property integer $read_count
 */
class Laws extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laws';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'from'], 'required'],
            [['content'], 'string'],
            [['create_at', 'update_at', 'read_count','is_new','sort'], 'integer'],
            ['sort','default','value'=>0],
            [['title', 'from'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'title' => '标题',
            'content' => '内容',
            'create_at' => '发布时间',
            'update_at' => '更新时间',
            'from' => '来源',
            'read_count' => '阅读数',
            'is_new'=>'是否为最新',
            'sort'=>'排序'
        ];
    }
    private static $is_newArr=[
        0=>'否',
        1=>'是'
    ];
    public static function getIsNewArr(){
        return static::$is_newArr;
    }
    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $this->create_at=time();
        }else {
            $this->update_at=time();
        }
        return parent::beforeSave($insert);
    }
}
