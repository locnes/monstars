<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Order Completed';

//echo $event->sender->menu->run();


echo Html::tag('h2', Html::encode("Order Summary"));
echo Html::tag('p', Html::encode("An email confirmation will arrive shortly."));


echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h4', 'T-Shirt Characteristics');
echo DetailView::widget([
    'model' => $data['step1'][0],
    'attributes' => [
        'size_id',
        'type_id',
        'color_id',
        'quantity'
    ]
]);
echo Html::endTag('div');



echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h4', 'Design chosen');
echo DetailView::widget([
    'model' => $data['step2'][0],
    'attributes' => [
        'design_id'
    ]
]);
echo Html::endTag('div');


echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h4', 'Customer details');
echo DetailView::widget([
    'model' => $data['step3'][0],
    'attributes' => [
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zipcode',
        'email',
        'phone_number'
    ]
]);
echo Html::endTag('div');


echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h4', 'Order status');
echo DetailView::widget([
    'model' => $data['step4'][0],
    'attributes' => [
        'order_status'
    ]
]);
echo Html::endTag('div');
