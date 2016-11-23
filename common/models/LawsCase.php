<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "laws_case".
 *
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $from
 * @property integer $create_time
 * @property integer $read_count
 */
class LawsCase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laws_case';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'from'], 'required'],
            [['content'], 'string'],
            [['create_time', 'read_count','sort'], 'integer'],
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
            'from' => '来源',
            'create_time' => '发布时间',
            'read_count' => '阅读数',
            'sort'=>'排序'
        ];
    }
    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $this->create_time=time();
        }
        return parent::beforeSave($insert);
    }
}
