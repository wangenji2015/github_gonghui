<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Minders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="minders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'uploader')->fileInput() ?>

    <?= $form->field($model, 'work_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_danwei')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'good_at')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
