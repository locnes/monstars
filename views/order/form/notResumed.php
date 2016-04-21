<?php
use yii\helpers\Html;

$this->title = 'Order NOT Resumed';

echo Html::tag('h1', $this->title);
echo Html::tag('div', 'The order was not successfully resumed; the data could not be read');

echo Html::a('Start another order', ['/order/form'], ['class' => 'btn btn-primary']);