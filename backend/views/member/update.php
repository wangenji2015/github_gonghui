<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = '更新信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '入会管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'level_id'=>$level_id,
        'model' => $model,
    ]) ?>

</div>
