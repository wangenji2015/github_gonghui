<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MysayType */

$this->title = 'Create Mysay Type';
$this->params['breadcrumbs'][] = ['label' => '我有话说--类别管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
