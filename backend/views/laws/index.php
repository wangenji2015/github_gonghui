<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '政策法规';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建政策法规', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
//            'content:ntext',
            'create_at',
            'update_at',
            // 'from',
            // 'read_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
