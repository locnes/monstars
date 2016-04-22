<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Order Completed';

//echo $event->sender->menu->run();

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Step 1');
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
echo Html::tag('h2', 'Address');
echo DetailView::widget([
    'model' => $data['address'][0],
    'attributes' => [
        'street_address',
        'locality',
        'region',
        'postal_code'
    ]
]);
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'Phone Number(s)');
foreach ($data['phoneNumber'] as $phoneNumber) {
    echo DetailView::widget([
        'model' => $phoneNumber,
        'attributes' => [
            'type',
            'value'
        ]
    ]);
}
echo Html::endTag('div');

echo Html::beginTag('div', ['class' => 'section']);
echo Html::tag('h2', 'User');
echo DetailView::widget([
    'model' => $data['user'][0],
    'attributes' => [
        'username',
        'password'
    ]
]);
echo Html::endTag('div');
