<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    --><?//= $form->field($model, 'id') ?>

<!--    --><?//= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender')->dropDownList(\common\models\Member::getAllGenders(),['prompt'=>'请选择性别']) ?>

    <?= $form->field($model, 'pin_id') ?>

    <?= $form->field($model, 'mobile') ?>

    <?= $form->field($model, 'is_do')->dropDownList(\common\models\MemberSearch::isDoArr(),['prompt'=>'选择代办事项'])->label("待办事项")?>

    <?php // echo $form->field($model, 'level_id') ?>

    <?php // echo $form->field($model, 'work_danwei') ?>

    <?php // echo $form->field($model, 'station') ?>

    <?php // echo $form->field($model, 'area_id') ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
