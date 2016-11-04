<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MindOnline */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mind Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mind-online-view">

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
            'gh_user_name',
            'gh_user_id',
            'gh_user_mobile',
            'content:ntext',
            'relpy:ntext',
            'minder_id',
            'create_time:datetime',
            'reply_time:datetime',
            'is_public',
        ],
    ]) ?>

</div>
