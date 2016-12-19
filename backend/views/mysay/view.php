<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mysay */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '我有话说', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'user_name',
            'mobile',
            'title',
            'level_id',
            'address',
            'type',
            'unit',
            'question:ntext',
            'reply:ntext',
            'create_time:datetime',
            'reply_time:datetime',
            'is_public',
        ],
    ]) ?>

</div>
