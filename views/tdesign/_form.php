<?php

use app\models\Tcategories;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tdesign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fileName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category')->dropDownList(
        ArrayHelper::map(Tcategories::find()->all(), 'id', 'cat_name')) ?>

    <? //= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->radioList(['Y' => 'Live', 'N' => 'Not Live'])->label() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
