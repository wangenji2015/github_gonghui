<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mind_case".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $from
 * @property integer $create_time
 * @property integer $read_count
 */
class MindCase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mind_case';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'from'], 'required'],
            [['content'], 'string'],
            [['create_time', 'read_count'], 'integer'],
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
        ];
    }
}
