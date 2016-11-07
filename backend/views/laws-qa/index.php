<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawsQaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '你问我答';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-qa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'content:ntext',
            'create_time:datetime',
            'from',
            // 'read_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
