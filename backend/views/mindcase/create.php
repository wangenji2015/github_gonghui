<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MindCase */

$this->title = '创建案例';
$this->params['breadcrumbs'][] = ['label' => '案例精选', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mind-case-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
