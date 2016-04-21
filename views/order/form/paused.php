<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Order Paused';

echo Html::tag('h1', $this->title);
echo Html::tag('div', strtr('Go to the following URL to resume your order: {url}', ['{url}' => Html::a(Url::to(['order/resume', 'uuid' => $uuid], true), ['order/resume', 'uuid' => $uuid])]));

echo Html::a('Start another order', ['/order/form'], ['class' => 'btn btn-primary']);