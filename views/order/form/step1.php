<?php

use beastbytes\wizard\WizardMenu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Order Form';


echo WizardMenu::pre();
echo WizardMenu::widget([
    'step' => $event->step,
    'wizard' => $event->sender,
    /*
    'items' => [
        ['template' => '<a href="{url}" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                {label}
                            </span>
                        </a>'],
        ['label' => '<i class="glyphicon glyphicon-folder-open"></i>'],
    ],
    */
    'encodeLabels' => false,
]);
echo WizardMenu::post();


echo Html::tag('h3', Html::encode("Choose your Shirt & Type"));

$form = ActiveForm::begin();
// All of the code to lay out the "step 1" stage should live right here, like what I have below:


//echo $form->field($model, 'size_id');
echo $form->field($model, 'size_id')->dropDownList($model->getSizeList(), ['prompt' => 'Please choose...']);

//echo $form->field($model, 'type_id');
echo $form->field($model, 'type_id')->dropDownList($model->getTypeList(), ['prompt' => 'Please choose...']);

//echo $form->field($model, 'color_id');
echo $form->field($model, 'color_id')->dropDownList($model->getColorList(), ['prompt' => 'Please choose...']);

echo $form->field($model, 'quantity');


echo Html::beginTag('div', ['class' => 'form-row buttons']);
echo Html::submitButton('Next', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
echo Html::submitButton('Pause', ['class' => 'button', 'name' => 'pause', 'value' => 'pause']);
echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
