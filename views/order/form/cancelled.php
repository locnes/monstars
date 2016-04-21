<?php
use yii\helpers\Html;

$this->title = 'Order Cancelled';

echo Html::tag('h1', $this->title);
echo Html::tag('div', 'The order has been cancelled');

echo Html::a('Start another order', ['/order/form'], ['class' => 'btn btn-primary']);
