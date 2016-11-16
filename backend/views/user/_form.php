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

    <?= $form->field($model, 'password')->textInput(['maxlength' => true])->label("密码") ?>

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
            <?= $form->field($model, 'minder_id')->textInput()->dropDownList(\common\models\Minders::getMinders(),['prompt'=>"选择心理专家"]) ?>
            <?= $form->field($model, 'other_level')->textInput()->dropDownList(\common\models\OtherLevel::getOtherLevel(),['prompt'=>'选择其他职务']) ?>
            <?php
        }
    ?>
    <?php
    $other_level=Yii::$app->user->identity->other_level;
    if($other_level===1) {
    ?>
        <?= $form->field($model, 'lawyer_id')->textInput()->dropDownList(\common\models\Lawyer::getLawyers(),['prompt'=>"选择律师"]) ?>
    <?php
    }
    ?>
    <?php
    if($other_level===2) {
        ?>
        <?= $form->field($model, 'minder_id')->textInput()->dropDownList(\common\models\Minders::getMinders(),['prompt'=>"选择心理专家"]) ?>
        <?php
    }
    ?>
    <?= $form->field($model, 'level_id')->dropDownList(\common\models\Level::getUnders($parent_id),['prompt'=>'请选择级别']) ?>
    <?= $form->field($model, 'role_info')->dropDownList(\common\models\User::getAllRoles(),['prompt'=>'请选择赋予的角色']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
