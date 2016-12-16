<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mysay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysay-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level_id')->dropDownList($model->getCurrentLevel()) ?>

    <?= $form->field($model, 'address')->dropDownList($model->getCurrentAddress()) ?>

    <?= $form->field($model, 'type')->dropDownList($model->getCurrentType()) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reply')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'reply_user_name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'create_time')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'reply_time')->textInput() ?>

    <?= $form->field($model, 'is_public')->dropDownList(\common\models\Mysay::getPublicArr()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
