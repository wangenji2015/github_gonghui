<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LawsQa */

$this->title = 'Update Laws Qa: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Laws Qas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="laws-qa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>