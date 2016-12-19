<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Level */

$this->title = '更新级别: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '级别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'level_id'=>$level_id,
        'model' => $model,
    ]) ?>

</div>
