<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ChangeMember */

$this->title = 'Create Change Member';
$this->params['breadcrumbs'][] = ['label' => 'Change Members', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
