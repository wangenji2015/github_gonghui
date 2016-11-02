<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LawyerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lawyers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lawyer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lawyer', ['create'], ['class' => 'btn btn-success']) ?>
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
