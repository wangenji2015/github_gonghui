<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GhdepartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gh Departs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gh-depart-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gh Depart', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent_id',
            [
                'label'=>'会员注册数',
                'value'=>function($model){
                    if($model->parent_id==73){
                        return $model->get_quxian_count($model->id);
                    }else {
                        $total_count=$model->get_all_count($model->id);
                        $GLOBALS['count']=0;
                        return $total_count;
                    }
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view'=>function($url,$model,$key){
                        return Html::a("查看下级工会",['index','parent_id'=>$key]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
