<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MysayAddress */

$this->title = 'Create Mysay Address';
$this->params['breadcrumbs'][] = ['label' => 'Mysay Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mysay-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
