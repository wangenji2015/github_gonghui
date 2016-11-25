<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ChangememebrSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '转会信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Change Member', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label'=>'性别',
                'value'=>function($model){
                    return $model->getGender();
                }
            ],
            'pin_id',
            'mobile',
            [
                'label'=>'申请时间',
                'value'=>function($model){
                    return date("Y-m-d H:i:s",$model->create_time);
                }
            ],
             'origin_gh',
            [
                'label'=>"所属级别",
                'value'=>function($model){
                    return $model->level->name;
                }
            ],
             'work_danwei',
            // 'area_id',
            // 'create_time:datetime',
            // 'is_pass',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
