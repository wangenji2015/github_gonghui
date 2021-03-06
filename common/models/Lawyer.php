<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "lawyer".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $avatar
 * @property string $work_time
 */
class Lawyer extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lawyer';
    }

    public $uploader;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'work_time','work_danwei','brief'], 'required'],
            ['sort','integer'],
            ['sort','default','value'=>0],
            [['name', 'mobile', 'avatar', 'work_time','good_at'], 'string', 'max' => 255],
            ['uploader', 'file', 'extensions' => 'png, jpg', 'skipOnEmpty' => true]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'name' => '姓名',
            'mobile' => '电话',
            'avatar' => '律师头像',
            'work_time' => '工作时间',
            'uploader'=>'头像照片',
            'work_danwei'=>'工作单位',
            'good_at' => '擅长领域(多个用逗号分隔开)',
            'brief' => '简介',
            'sort'=>'排序'
        ];
    }
    public function beforeSave($insert)
    {
        $this->uploader=UploadedFile::getInstance($this,'uploader');
        if($this->uploader){
            $savePath='/data/avatar';
            $realPath=Yii::getAlias("@webroot").$savePath;
            if(!is_dir($realPath)){
                mkdir($realPath,0777,true);
            }
            $newName=$savePath . "/" . md5(time()) .".".$this->uploader->getExtension();
            $this->avatar=$newName;
            $this->uploader->saveAs(Yii::getAlias("@webroot").$newName);
        }

        return parent::beforeSave($insert);
    }

    public static function getLawyers(){
        $laws=static::find()->asArray()->all();
        $laws_arr=[];
        foreach ($laws as $k => $v){
            $laws_arr[$v['id']]=$v['name'];
        }
        return $laws_arr;
    }
}
