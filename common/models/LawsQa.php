<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;


/**
 * This is the model class for table "laws_qa".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $create_time
 * @property string $from
 * @property integer $read_count
 * @property string $img
 */
class LawsQa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laws_qa';
    }
    public $uploader;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','from'], 'required'],
            [['content'], 'string'],
            [['create_time', 'read_count','sort'], 'integer'],
            [['title', 'from'], 'string', 'max' => 255],
            ['sort','default','value'=>0],
            ['uploader', 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true],
            ['img','string','max'=>255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'create_time' => '发布时间',
            'from' => '来源',
            'read_count' => '阅读数',
            'uploader' => '列表缩略图',
            'sort'=>'排序'
        ];
    }
    public function beforeSave($insert)
    {
        if($this->isNewRecord){
            $this->create_time=time();
        }
        $this->uploader=UploadedFile::getInstance($this,'uploader');
        if($this->uploader){
            $savePath="/data/lawsqa";
            $realPath=Yii::getAlias("@webroot").$savePath;
            if(!$realPath){
                mkdir($realPath,0755);
            }
            $newName=$savePath."/".md5(time()).".".$this->uploader->getExtension();
            $this->img=$newName;
            $this->uploader->saveAs(Yii::getAlias("@webroot").$newName);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }
}
