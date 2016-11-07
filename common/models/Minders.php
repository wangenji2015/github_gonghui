<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "minders".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $avatar
 * @property string $work_time
 * @property string $good_at
 */
class Minders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'minders';
    }
    public $uploader;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'work_time','work_danwei'], 'required'],
            [['name', 'mobile', 'avatar', 'work_time','good_at'], 'string', 'max' => 255],
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
            'avatar' => '头像',
            'work_time' => '工作时间',
            'work_danwei'=>'工作单位',
            'uploader' => '头像照片',
            'good_at' => '擅长领域(多个用逗号分隔开)'
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
    public static function getMinders(){
        $minders=static::find()->asArray()->all();
        $minders_arr=[];
        foreach ($minders as $k => $v){
            $minders_arr[$v['id']]=$v['name'];
        }
        return $minders_arr;
    }
}
