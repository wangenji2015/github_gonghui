<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true])->label("密码") ?>

<!--    --><?//= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'role')->textInput() ?>

<!--    --><?//= $form->field($model, 'status')->textInput() ?>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>
    <?php
        $user_level=Yii::$app->user->identity->level_id;
        if($user_level===0 || $user_level===1) {
            ?>
            <?= $form->field($model, 'lawyer_id')->textInput()->dropDownList(\common\models\Lawyer::getLawyers(),['prompt'=>"选择律师"]) ?>
            <?= $form->field($model, 'other_level')->textInput()->dropDownList(\common\models\OtherLevel::getOtherLevel(),['prompt'=>'选择其他职务']) ?>
            <?php
        }
    ?>
    <?= $form->field($model, 'level_id')->dropDownList(\common\models\User::getAllLevels($parent_id),['prompt'=>'请选择级别']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
