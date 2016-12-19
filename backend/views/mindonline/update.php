<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MindOnline */

$this->title = '更新在线咨询: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '在线咨询', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mind-online-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
