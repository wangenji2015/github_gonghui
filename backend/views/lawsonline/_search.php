<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LawsonlineSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laws-online-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'gh_user_name') ?>

    <?= $form->field($model, 'gh_user_id') ?>

    <?= $form->field($model, 'gh_user_mobile') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'relpy') ?>

    <?php // echo $form->field($model, 'lawyer_id') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'reply_time') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
