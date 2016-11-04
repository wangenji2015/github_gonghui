<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MindKnowledge */

$this->title = '创建心理知识';
$this->params['breadcrumbs'][] = ['label' => 'Mind Knowledges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mind-knowledge-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
