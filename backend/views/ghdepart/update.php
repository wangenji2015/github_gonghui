<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GhDepart */

$this->title = 'Update Gh Depart: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gh Departs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gh-depart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
