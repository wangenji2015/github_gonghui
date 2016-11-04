<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawscaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '案例分析';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-case-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建案例分析', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'content:ntext',
            'from',
            'create_time:datetime',
            // 'read_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
