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
        ['template' => '<a href="{url}" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                {label}
                            </span>
                        </a>'],
        ['label' => '<i class="glyphicon glyphicon-piggy-bank"></i>'],
    ],
    */
    'encodeLabels' => false,
]);
echo WizardMenu::post();


echo Html::tag('h3', Html::encode("Choose Your Design"));

$form = ActiveForm::begin();
// All of the code to lay out the "step 2" stage should live right here, like what I have below:

echo Html::beginTag('div', ['class' => 'form-row buttons']);

//echo $form->field($model, 'type_id');
echo $form->field($model, 'design_id')->dropDownList($model->getDesignsHierarchy(), ['prompt' => 'Please choose...'])->hint('Pick a F*cking T-Shirt!');



echo Html::submitButton('Prev', ['class' => 'button', 'name' => 'prev', 'value' => 'prev']);
echo Html::submitButton('Next', ['class' => 'button', 'name' => 'next', 'value' => 'next']);
echo Html::submitButton('Pause', ['class' => 'button', 'name' => 'pause', 'value' => 'pause']);
echo Html::submitButton('Cancel', ['class' => 'button', 'name' => 'cancel', 'value' => 'pause']);
echo Html::endTag('div');
ActiveForm::end();
