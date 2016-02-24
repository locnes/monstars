<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tgender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tgender-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'g_name')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->radioList(['Y' => 'Live', 'N' => 'Not Live'])->label() ?>


    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
