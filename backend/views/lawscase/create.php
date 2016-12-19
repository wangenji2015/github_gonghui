<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LawsCase */

$this->title = '创建案例分析';
$this->params['breadcrumbs'][] = ['label' => '案例分析', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laws-case-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
