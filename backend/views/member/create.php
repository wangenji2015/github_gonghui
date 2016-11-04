<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Member */

$this->title = '创建信息';
$this->params['breadcrumbs'][] = ['label' => 'Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'level_id'=>$level_id,
        'model' => $model,
    ]) ?>

</div>
