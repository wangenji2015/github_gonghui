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

    <?= $form->field($model, 'password')->textInput(['maxlength' => true])->label("密码") ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true,'id'=>'ee']) ?>
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
<!--    --><?//= $form->field($model, 'other_level')->textInput()->dropDownList(\common\models\OtherLevel::getOtherLevel(),['prompt'=>'职务']) ?>
<!--    --><?//= $form->field($model, 'level_id')->dropDownList(\common\models\Level::getUnders($parent_id),['prompt'=>'关联级别','style'=>'display:none'])->label(false) ?>
<!--    --><?//= $form->field($model, 'lawyer_id')->textInput()->dropDownList(\common\models\Lawyer::getLawyers(),['prompt'=>"关联律师",'style'=>'display:none'])->label(false) ?>
<!--    --><?//= $form->field($model, 'minder_id')->textInput()->dropDownList(\common\models\Minders::getMinders(),['prompt'=>"关联心理专家",'style'=>'display:none'])->label(false) ?>
<!--    --><?//= $form->field($model, 'role_info')->dropDownList(\common\models\User::getAllRoles(),['prompt'=>'请选择赋予的角色']) ?>
<!--    --><?php //$this->beginBlock('test') ?>
<!--        $('#user-other_level').change(function(){-->
<!--            var $other = $('#user-other_level').val();-->
<!--            if($other==5){-->
<!--                $('#user-level_id').show();-->
<!--                $('#user-lawyer_id').hide();-->
<!--                $('#user-minder_id').hide();-->
<!--            }else if($other==3){-->
<!--                $('#user-lawyer_id').show();-->
<!--                $('#user-level_id').hide();-->
<!--                $('#user-minder_id').hide();-->
<!--            }else if($other==4){-->
<!--                $('#user-lawyer_id').hide();-->
<!--                $('#user-level_id').hide();-->
<!--                $('#user-minder_id').show();-->
<!--            }-->
<!--        });-->
<!---->
<!--    --><?php //$this->endBlock() ?>
<!---->
<!--    --><?php //$this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
