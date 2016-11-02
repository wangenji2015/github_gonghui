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
            [['title', 'content', 'create_at', 'update_at', 'from', 'read_count'], 'required'],
            [['content'], 'string'],
            [['create_at', 'update_at', 'read_count'], 'integer'],
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
        ];
    }
}
