<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ChangeMember */

$this->title = '更新: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Change Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="change-member-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
