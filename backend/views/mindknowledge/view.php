<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MindKnowledge */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '心理知识', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mind-knowledge-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'title',
            'content:ntext',
            'create_time:datetime',
            'from',
            'read_count',
        ],
    ]) ?>

</div>
