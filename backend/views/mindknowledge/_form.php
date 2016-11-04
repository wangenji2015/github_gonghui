<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MindKnowledge */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mind-knowledge-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget('pjkui\kindeditor\Kindeditor',['clientOptions'=>['allowFileManager'=>'true','allowUpload'=>'true']]) ?>

<!--    --><?//= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'read_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
