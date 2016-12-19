<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MindCase */

$this->title = '更新案例: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '案例精选', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mind-case-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
