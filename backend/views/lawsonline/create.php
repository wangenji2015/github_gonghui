<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LawsOnline */

$this->title = 'Create Laws Online';
$this->params['breadcrumbs'][] = ['label' => 'Laws Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-online-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
