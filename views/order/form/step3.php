<?php
use beastbytes\wizard\WizardMenu;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Order Form';

echo WizardMenu::widget(['step' => $event->step, 'wizard' => $event->sender]);

echo Html::tag('h1', Html::encode("Step 3"));
echo Html::tag('h3', Html::encode("Checkout"));

$form = ActiveForm::begin();
// All of the code to lay out the "step 3" stage should live right here, like what I have below:
echo $form->field($model, 'first_name');
echo $form->field($model, 'last_name');
echo $form->field($model, 'address');
echo $form->field($model, 'city');
echo $form->field($model, 'state');
echo $form->field($model, 'zipcode');
echo $form->field($model, 'email');
echo $form->field($model, 'phone_number');

echo Html::beginTag('div', ['class' => 'form-row buttons']);
echo Html::submitButton('Prev', ['class' => 'button', 'name' => 'prev', 'value' => 'prev']);
echo Html::submitButton('Next', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
echo Html::submitButton('Pause', ['class' => 'button', 'name' => 'pause', 'value' => 'pause']);
echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
