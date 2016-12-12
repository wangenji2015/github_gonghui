<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MysayLevel */

$this->title = 'Update Mysay Level: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mysay Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mysay-level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>