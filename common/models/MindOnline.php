<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mind_online".
 *
 * @property integer $id
 * @property string $gh_user_name
 * @property integer $gh_user_id
 * @property string $gh_user_mobile
 * @property string $content
 * @property string $relpy
 * @property integer $minder_id
 * @property integer $create_time
 * @property integer $reply_time
 * @property integer $is_public
 */
class MindOnline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mind_online';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['gh_user_id', 'minder_id', 'create_time', 'reply_time', 'is_public'], 'integer'],
            [['content', 'relpy'], 'string'],
            [['gh_user_name', 'gh_user_mobile'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'gh_user_name' => '爱工惠会员名称',
            'gh_user_id' => '爱工惠会员ID',
            'gh_user_mobile' => '会员电话',
            'content' => '内容',
            'relpy' => '回复内容',
            'minder_id' => '咨询专家',
            'create_time' => '发布时间',
            'reply_time' => '回复时间',
            'is_public' => '是否公开',
        ];
    }
    private static $publicArr=[
        0=>'不公开',
        1=>'公开'
    ];

    public static function getPublicArr(){
        return static::$publicArr;
    }
    public function beforeSave($insert)
    {
        if(!$this->isNewRecord){
            $this->reply_time=time();
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
