<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Members';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            [
                'label'=>"性别",
                'value'=>function($model){
                    return $model->getGenderLabel();
                }
            ],
            'pin_id',
            'mobile',
            [
                'label'=>"所属级别",
                'value'=>function($model){
                    return $model->level->name;
                }
            ],
            [
                'label'=>"单位所在区域",
                'value'=>function($model){
                    return $model->area->name;
                }
            ],
            // 'level_id',
            // 'work_danwei',
            // 'station',
            // 'area_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
