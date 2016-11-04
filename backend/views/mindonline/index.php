<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MindOnlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '在线咨询';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mind-online-index">

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
            'gh_user_id',
            'gh_user_mobile',
            'content:ntext',
            // 'relpy:ntext',
            // 'minder_id',
            // 'create_time:datetime',
            // 'reply_time:datetime',
            // 'is_public',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
