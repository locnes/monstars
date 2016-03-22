<?php

use kartik\money\MaskMoney;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tsizes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tsizes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_name')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'price_add')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price_add')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$',
            'allowNegative' => false
        ]
    ]);
    ?>

    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->radioList(['Y' => 'Live', 'N' => 'Not Live'])->label() ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
