<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MindersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '心理专家';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建心理专家', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'mobile',
            'avatar',
            'work_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
