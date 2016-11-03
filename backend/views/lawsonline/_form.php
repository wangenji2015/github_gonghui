<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LawsOnline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laws-online-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gh_user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gh_user_id')->textInput() ?>

    <?= $form->field($model, 'gh_user_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'relpy')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'lawyer_id')->textInput()->dropDownList(\common\models\Lawyer::getLawyers(),['prompt'=>'选择律师']) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'reply_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
