<?php
use yii\helpers\Html;

$this->title = 'Order NOT Paused';

echo Html::tag('h1', $this->title);
echo Html::tag('div', 'The order was not successfully paused; the data could not be saved');
echo Html::a('Choose Another Demo', '/wizard');
