<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = '修改政策法规: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '政策法规', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="laws-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
