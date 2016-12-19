<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Lawyer */

$this->title = '创建律师';
$this->params['breadcrumbs'][] = ['label' => '律师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lawyer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
