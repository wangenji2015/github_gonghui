<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MysayLevel */

$this->title = 'Create Mysay Level';
$this->params['breadcrumbs'][] = ['label' => '我有话说--发往地管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
