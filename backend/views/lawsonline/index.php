<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawsonlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '在线咨询';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-online-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建在线咨询', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'gh_user_name',
//            'gh_user_id',
//            'gh_user_mobile',
            [
                'label'=>"是否回复",
                'value'=>function($model){
                    if($model->relpy==""){
                        return "未回复";
                    }else {
                        return "已回复";
                    }
                }
            ],
//            'content:ntext',
            [
                'label'=>"内容",
                'value'=>function($model){
                    return mb_substr($model->content,0,25);
                }
            ],

            // 'relpy:ntext',
            // 'lawyer_id',
            // 'create_time:datetime',
            // 'reply_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
