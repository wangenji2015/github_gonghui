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

<!--    --><?//= $form->field($model, 'gh_user_id')->textInput() ?>

    <?= $form->field($model, 'gh_user_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'relpy')->textarea(['rows' => 6]) ?>

    <?php
    $other_level= Yii::$app->user->identity->other_level;
    $level= Yii::$app->user->identity->level_id;
    if($other_level ===1 || $level===0 || $level===1){
        ?>
        <?= $form->field($model, 'lawyer_id')->dropDownList(\common\models\Lawyer::getLawyers()) ?>
        <?= $form->field($model, 'is_public')->dropDownList(\common\models\LawsOnline::getPublicArr(),['prompt'=>'是否公开']) ?>
        <?php
    }
    ?>

<!--    --><?//= $form->field($model, 'create_time')->textInput() ?>

<!--    --><?//= $form->field($model, 'reply_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
