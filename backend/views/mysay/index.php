<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MysaySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '我有话说';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'user_id',
            'user_name',
            'mobile',
            'title',
            // 'level_id',
            // 'address',
            // 'type',
            [
                'label'=>'发往地',
                'value'=>function($model){
                    return $model->level->name;
                }
            ],
            [
                'label'=>'分类',
                'value'=>function($model){
                    return $model->types->name;
                }
            ],
             'unit',
            // 'question:ntext',
            [
                'label'=>'问题描述',
                'value'=>function($model){
                    return mb_substr($model->question,0,25);
                }
            ],
            [
                'label'=>'是否回复',
                'value'=>function($model){
                    if($model->reply){
                        return "已回复";
                    }else {
                        return "未回复";
                    }
                }
            ],
            // 'create_time:datetime',
            // 'reply_time:datetime',
            // 'is_public',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
