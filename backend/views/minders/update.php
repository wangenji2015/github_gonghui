<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Minders */

$this->title = '更新心理专家: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '心理专家管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="minders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
