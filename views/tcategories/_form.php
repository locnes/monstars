<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tcategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tcategories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cat_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_discr')->textInput(['maxlength' => true]) ?>

    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <? //= $form->field($model, 'status')->radioList(['Y' => 'Live', 'N' => 'Not Live'])->label() ?>
    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt' => 'Please choose...']) ?>


    <?= $form->field($model, 'sort_order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
