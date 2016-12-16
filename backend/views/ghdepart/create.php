<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GhDepart */

$this->title = 'Create Gh Depart';
$this->params['breadcrumbs'][] = ['label' => 'Gh Departs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gh-depart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
