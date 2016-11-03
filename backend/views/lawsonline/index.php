<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawsonlineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laws Onlines';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-online-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Laws Online', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'lawyer_id',
            // 'create_time:datetime',
            // 'reply_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
