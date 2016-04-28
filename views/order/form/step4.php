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
        ['template' => '<a href="{url}" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                {label}
                            </span>
                        </a>'],
        ['label' => '<i class="glyphicon glyphicon-ok-sign"></i>'],
    ],
    */
    'encodeLabels' => false,
]);
echo WizardMenu::post();


$form = ActiveForm::begin();
// All of the code to lay out the "step 4" stage should live right here:

echo Html::tag('h3', Html::encode("Confirmation page"));

echo $form->field($model, 'order_status');



echo Html::beginTag('div', ['class' => 'form-row buttons']);
echo Html::submitButton('Prev', ['class' => 'button', 'name' => 'prev', 'value' => 'prev']);
echo Html::submitButton('Done', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
