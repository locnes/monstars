<?php
use yii\helpers\Html;

$this->title = 'Order Not Started';

echo Html::tag('div', 'The order did not start');

echo Html::a('Start another order', ['/order/form'], ['class' => 'btn btn-primary']);