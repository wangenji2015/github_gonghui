<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Mysay */

$this->title = 'Create Mysay';
$this->params['breadcrumbs'][] = ['label' => '我有话说', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
