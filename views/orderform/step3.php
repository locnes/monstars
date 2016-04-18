<?php
use beastbytes\wizard\WizardMenu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Order Form';

echo WizardMenu::widget(['step' => $event->step, 'wizard' => $event->sender]);


$form = ActiveForm::begin();
// All of the code to lay out the "step 3" stage should live right here, like what I have below:
echo $form->field($model, 'field1');
echo $form->field($model, 'field2');
echo $form->field($model, 'field3');
echo $form->field($model, 'field4');

echo Html::beginTag('div', ['class' => 'form-row buttons']);
echo Html::submitButton('Prev', ['class' => 'button', 'name' => 'prev', 'value' => 'prev']);
echo Html::submitButton('Next', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
echo Html::submitButton('Pause', ['class' => 'button', 'name' => 'pause', 'value' => 'pause']);
echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
