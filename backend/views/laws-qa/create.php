<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LawsQa */

$this->title = '创建你问我答';
$this->params['breadcrumbs'][] = ['label' => '你问我答', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-qa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
