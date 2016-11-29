<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_permission".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property integer $type
 */
class UserPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'route', 'type'], 'required'],
            [['type'], 'integer'],
            [['name', 'route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'name' => '权限名称',
            'route' => '路由',
            'type' => '权限组',
        ];
    }
    public static function types(){
        $tyeps=UserPermissionType::find()->asArray()->all();
        $arr=[];
        foreach ($tyeps as $k=>$v){
            $arr[$v['id']]=$v['name'];
        }
        return $arr;
    }
    public static function getPms(){
        $manager=Yii::$app->authManager;
        $pms=$manager->getPermissionsByUser(Yii::$app->user->getId());
        $pms=array_splice($pms,1);
//        echo json_encode($pms);
        $new_pms=[];
        foreach ($pms as $k=>$v){
            $upms=UserPermission::find()->where(['route'=>$k])->one();
//            var_dump($upms);
            $new_pms[$upms->id]=$upms->name;
//            echo json_encode($upms);
        }
        return$new_pms;
    }
}
