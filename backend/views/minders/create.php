<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Minders */

$this->title = '创建心理专家';
$this->params['breadcrumbs'][] = ['label' => '心理专家管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="minders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
