<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ChangeMember */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="change-member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(\common\models\ChangeMember::allGenders()) ?>

    <?= $form->field($model, 'pin_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'origin_gh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_danwei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_id')->dropDownList(\common\models\Level::getAllLevels(Yii::$app->user->identity->level_id),['prompt'=>'请选择分发到下属级别']) ?>

    <?= $form->field($model, 'area_id')->dropDownList($model->getCurrentArea()) ?>

<!--    --><?//= $form->field($model, 'create_time')->textInput() ?>

    <?php
    $user=new \common\models\User();
    if($user->getIsLow(Yii::$app->user->identity->level_id)){
        ?>
        <?= $form->field($model, 'is_pass')->dropDownList(\common\models\ChangeMember::getIsPass()) ?>
        <?php
    }else {
        ?>
        <?= $form->field($model, 'is_pass')->dropDownList(\common\models\ChangeMember::getIsPass(),['disabled'=>'disabled']) ?>
        <?php
    }
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
