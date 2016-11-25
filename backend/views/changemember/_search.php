<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ChangememebrSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

<!--    --><?//= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'pin_id') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'is_do')->dropDownList(\common\models\ChangememebrSearch::getIsdoArr(),['prompt'=>"选择处理状态"])->label("处理状态") ?>

    <?php // echo $form->field($model, 'origin_gh') ?>

    <?php // echo $form->field($model, 'work_danwei') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'is_pass') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
