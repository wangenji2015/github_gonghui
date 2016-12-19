<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Laws */

$this->title = '创建政策法规';
$this->params['breadcrumbs'][] = ['label' => '政策法规', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
