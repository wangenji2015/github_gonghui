<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Level */

$this->title = '创建级别';
$this->params['breadcrumbs'][] = ['label' => 'Levels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'level_id'=>$level_id,
        'model' => $model,
    ]) ?>

</div>
