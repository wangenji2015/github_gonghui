<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserPermissionType */

$this->title = 'Create User Permission Type';
$this->params['breadcrumbs'][] = ['label' => 'User Permission Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permission-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
