<?php

use dosamigos\tinymce\TinyMce;
use kartik\money\MaskMoney;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Tdesign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tdesign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$',
            'allowNegative' => false
        ]
    ]);
    ?>

    <?= $form->field($model, 'description')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en_CA',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]); ?>

    <?= $form->field($model, 'fileName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoryId')->dropDownList($model->getCategoryList(), ['prompt' => 'Please choose...']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStatusList(), ['prompt' => 'Please choose...']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
