<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '入会信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
//        'layout'=>"{sorter}\n{summary}\n{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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
                'label'=>'申请时间',
                'value'=>function($model){
                    return date("Y-m-d H:i:s",$model->create_time);
                }
            ],
            [
                'label'=>"所属级别",
                'value'=>function($model){
                    return $model->level->name;
                }
            ],
            [
                'label'=>"工作单位",
                'value'=>function($model){
                    return $model->work_danwei;
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
