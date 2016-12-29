<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MysaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mysay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'is_reply')->dropDownList(\common\models\MysaySearch::get_is_reply(),['prompt'=>'是否回复'])->label("是否回复") ?>
    <?= $form->field($model, 'level_id')->dropDownList(\common\models\MysayLevel::mySayLevel(),['prompt'=>'请选择发往地'])->label("发往地") ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
