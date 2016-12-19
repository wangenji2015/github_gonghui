<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MysayAddress */

$this->title = 'Update Mysay Address: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '我有话说--事发地管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mysay-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
