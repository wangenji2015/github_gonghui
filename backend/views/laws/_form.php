<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Laws */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laws-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'content')->widget('pjkui\kindeditor\KindEditor',['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>
<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'create_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'update_at')->textInput() ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'is_new')->dropDownList(\common\models\Laws::getIsNewArr()) ?>

<!--    --><?//= $form->field($model, 'read_count')->textInput() ?>
    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
