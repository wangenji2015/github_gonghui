<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LawsOnline */

$this->title = '创建在线咨询';
$this->params['breadcrumbs'][] = ['label' => '在线咨询', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-online-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
